<?php

include '.env.php';

class DB {

    public static function conn() {

        try {
            $conn = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
            //$conn = new PDO("mysql:host=localhost;dbname=registro_usuarios", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "HA FALLADO LA CONEXIÓN: " . $e->getMessage();
        }
    }


    public static function comprobarUsuario($email) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from users_data where email = :email";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":email" => $email));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
    public static function comprobarUsuarioB($usuario) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from users_login where usuario = :usuario";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":usuario" => $usuario));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
    

    public static function buscarID($id) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from users_data where idUser = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    /**
     * inserta en la tabla users_data y users_login
     * @param string $nombre
     * @param string $email
     * @param string $contrasena
     */
    public static function insertar($nombre, $apellidos, $email, $telefono, $fechaNac, $direccion, $sexo, $usuario, $encrypt_pass) {
        $conexion = self::conn();
    
        // Insertar datos en users_data
        $sentencia_data = 'INSERT INTO users_data (nombre, apellidos, email, telefono, fecha_nacimiento, direccion, sexo) VALUES (:nombre, :apellidos, :email, :telefono, :fecha_nacimiento, :direccion, :sexo)';
        $consulta_data = $conexion->prepare($sentencia_data);
        $consulta_data->bindParam(":nombre", $nombre);
        $consulta_data->bindParam(":apellidos", $apellidos);
        $consulta_data->bindParam(":email", $email);
        $consulta_data->bindParam(":telefono", $telefono);
        $consulta_data->bindParam(":fecha_nacimiento", $fechaNac);
        $consulta_data->bindParam(":direccion", $direccion);
        $consulta_data->bindParam(":sexo", $sexo);
        $consulta_data->execute();
        $consulta_data->closeCursor();
    
        // Obtener el ID del usuario recién insertado
        $idUsuario = $conexion->lastInsertId();
    
        // Insertar datos en users_login
        $sentencia_login = 'INSERT INTO users_login (IdUser, usuario, password, rol) VALUES (:idUser, :usuario, :password, :rol)';
        $rol = "user";
        $consulta_login = $conexion->prepare($sentencia_login);
        $consulta_login->bindParam(":idUser", $idUsuario);
        $consulta_login->bindParam(":usuario", $usuario);
        $consulta_login->bindParam(":password", $encrypt_pass);
        $consulta_login->bindParam(":rol", $rol);
        $consulta_login->execute();
        $consulta_login->closeCursor();
    
        $conexion = null;
        // echo "registro insertado";
    }


}