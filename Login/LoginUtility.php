<?php
include_once ("../BD/Database.php");

class LoginUtility{

     public static function getUserByLogin($user,$password){
        try{
            $instance = Database::getInstance();
            $query = "SELECT id, nombre_usuario, contrasena,role FROM usuarios where nombre_usuario = :user AND contrasena=:password";
            $stmt = $instance->prepare($query);
            $stmt -> bindParam(':user',$user,PDO::PARAM_STR);
            $stmt -> bindParam(':password',$password,PDO::PARAM_STR);
            $stmt -> execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$user){
                throw new Exception("El usuario con nombre: $user no existe en la base de datos");

            }
            
            return $user;
        }catch(Exception $e){
                throw new Exception("Error al encontrar el usuario");
        }
}
}