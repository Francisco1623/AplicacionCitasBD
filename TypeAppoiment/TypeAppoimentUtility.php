<?php

require_once '../BD/Database.php';

class TypeAppoimentUtility{
    public static function getTypeAppoiment(){
        try{
            $instance = Database::getInstance();
            $query = "SELECT id,nombre FROM tipos_cita";
            $stmt = $instance->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception("Error en la base de datos");
        }
    }

    public static function getTypeById($id){
    try{
        $instance = Database::getInstance();
        $query = "SELECT id, nombre FROM tipos_cita where id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        $type = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$type){
            throw new Exception("El tipo de cita con ID $id no existe en la base de datos");

        }
        return $type;
    }catch(Exception $e){
            throw new Exception("Error al encontrar el tipo de cita");
        }
}

public static function deleteType($id){
    try{
        $instance = Database::getInstance();
        $query = "DELETE FROM tipos_cita where id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al eliminar el tipo de cita");
        }
}


public static function updateType($id,$name){
    $exist = self::existType($name);
    if(!empty($exist)){
        throw new Exception("El tipo de cita ya existe en la base de datos");    
        }
    try{
        $instance = Database::getInstance();
        $query = "UPDATE tipos_cita SET nombre = :name where id=:id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> bindParam(':name',$name,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al actualizar el tipo de cita");
        }
}

public static function existType($name){
    try{
        $instance = Database::getInstance();
        $query = "SELECT nombre FROM tipos_cita WHERE nombre=:name";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':name',$name,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar el tipo de cita");
        }
}


public static function addType($name){
    $exist = self::existType($name);
    if(!empty($exist)){
        throw new Exception("El tipo de cita ya existe en la base de datos");    
        }
    try{
        $instance = Database::getInstance();
        $query = "INSERT INTO tipos_cita (nombre)VALUES (:name)";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':name',$name,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }catch(Exception $e){
            throw new Exception("Error al crear el tipo de cita");
        }
}
}



?>