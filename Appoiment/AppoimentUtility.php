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
}