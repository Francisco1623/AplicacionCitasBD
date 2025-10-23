<?php
include_once ("../BD/Database.php");

class UserUtility{
    public static function getUsers(){
        try{
            $instance = Database::getInstance();
            $query = "SELECT id,nombre_usuario,contrasena FROM usuarios";
            $stmt = $instance->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            throw new Exception("Error en la base de datos");
        }
        

    }
}