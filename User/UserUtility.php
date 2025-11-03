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

    public static function getUserById($id){
    try{
        $instance = Database::getInstance();
        $query = "SELECT id, nombre_usuario, contrasena FROM usuarios where id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user){
            throw new Exception("El usuario con ID $id no existe en la base de datos");

        }
        return $user;
    }catch(Exception $e){
            throw new Exception("Error al encontrar el usuario");
        }
}

public static function deleteUser($id){
    try{
        $instance = Database::getInstance();
        $query = "DELETE FROM usuarios where id = :id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al eliminar el usuario");
        }
}


public static function updateUser($id,$user,$password){
    $exist = self::existUser($user);
    if(!empty($exist)){
        throw new Exception("El usuario ya existe en la base de datos");    
        }
    try{
        $instance = Database::getInstance();
        $query = "UPDATE usuarios SET nombre_usuario = :user,contrasena = :password where id=:id";
        $stmt = $instance->prepare($query);
       
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> bindParam(':user',$user,PDO::PARAM_STR);
        $stmt -> bindParam(':password',$password,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al actualizar el usuario");
        }
}

public static function existUser($user){
    try{
        $instance = Database::getInstance();
        $query = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario=:user";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':user',$user,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar el usuario");
        }
}


public static function addUser($user,$password){
    $exist = self::existUser($user);
    if(!empty($exist)){
        throw new Exception("El usuario ya existe en la base de datos");    
        }
    try{
        $instance = Database::getInstance();
        $query = "INSERT INTO usuarios (nombre_usuario,contrasena)VALUES (:user,:password)";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':user',$user,PDO::PARAM_STR);
        $stmt -> bindParam(':password',$password,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }catch(Exception $e){
            throw new Exception("Error al crear el usuario");
        }
}
}