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
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
            throw new Exception("Error al encontrar el usuario");
        }
}


public static function updateUser($id,$name,$password){
    try{
        $instance = Database::getInstance();
        $query = "UPDATE usuarios SET id = :id ,nombre_usuario = :name,contrasena = :password where id=:id";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> bindParam(':name',$name,PDO::PARAM_STR);
        $stmt -> bindParam(':password',$password,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
            throw new Exception("Error al encontrar el usuario");
        }
}


public static function addUser($name,$password){
    try{
        $instance = Database::getInstance();
        $query = "INSERT INTO usuarios (name,password)VALUES (:name,:password)";
        $stmt = $instance->prepare($query);
        $stmt -> bindParam(':name',$userId,PDO::PARAM_STR);
        $stmt -> bindParam(':password',$typeId,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }catch(Exception $e){
            throw new Exception("Error al encontrar al crear el usuario");
        }
}
}