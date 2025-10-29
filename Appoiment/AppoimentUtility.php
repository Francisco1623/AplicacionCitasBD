<?php
include_once ("../BD/Database.php");

class AppoimentUtility{
    public static function getAppoiments(){
        try{
            $instance = Database::getInstance();
            $query = "SELECT citas.id as \"id\", nombre_usuario as \"usuario_id\",nombre as \"tipo_cita_id\", fecha, hora FROM citas , usuarios, tipos_cita where citas.usuario_id = usuarios.id and citas.tipo_cita_id =tipos_cita.id";
            $stmt = $instance->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            throw new Exception("Error en la conexion con la base de datos");
        }
    

}

public static function getAppoimentById($id){
    try{
        $instance = Database::getInstance();
            $query = "SELECT citas.id as \"id\", nombre_usuario as \"usuario_id\",nombre as \"tipo_cita_id\", fecha, hora FROM citas , usuarios, tipos_cita where citas.usuario_id = usuarios.id and citas.tipo_cita_id =tipos_cita.id and citas.id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar la cita");
        }
}

public static function deleteAppoiment($id){
    try{
        $instance = Database::getInstance();
        $query = "DELETE FROM citas where citas.id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar la cita");
        }
}


public static function updateAppoiment($id,$userId,$typeId,$date,$time){
    try{
        $instance = Database::getInstance();
        $query = "UPDATE citas SET usuario_id = :userId ,tipo_cita_id = :typeId,fecha = :date,hora = :time where id=:id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> bindParam(':userId',$userId,PDO::PARAM_INT);
        $stmt -> bindParam(':typeId',$typeId,PDO::PARAM_INT);
        $stmt -> bindParam(':date',$date,PDO::PARAM_STR);
        $stmt -> bindParam(':time',$time,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar la cita");
        }
}
}