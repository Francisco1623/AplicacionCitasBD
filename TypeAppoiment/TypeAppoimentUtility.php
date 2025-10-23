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
}



?>