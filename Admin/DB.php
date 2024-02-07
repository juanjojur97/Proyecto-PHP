<?php

include '../Models/.env.php';

class DB {

    public function __construct(){
        if($_SESSION['usuario']['rol'] != "admin" || $_SESSION['usuario']['rol'] != "user"){
            header('Location: ../views/login.php');
            exit();
        }
    }

    public static function conn() {

        try {
            $conn = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
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
    public static function buscarID_noticia($id) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from noticias where idNoticia = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
    public static function buscarID_cita($id) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from citas where idUser = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    public static function buscarID_update($id) {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from users_data where idUser = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();

        $sentencia2 = "Select * from users_login where idUser = :id";
        $consulta = $conexion->prepare($sentencia2);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
/**
 * 
 * @return array
 */
    public static function verTodos() {
        $result = [];
        $conexion = self::conn();
        $sentencia = "Select * from users_data";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute();
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    public static function verNoticias(){
        $result = [];
        $conexion = self::conn();
        $sentencia = "SELECT * from noticias";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute();
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }
    public static function verCitas(){
        $result = [];
        $conexion = self::conn();
        $sentencia = "SELECT * from citas";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute();
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }


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
    public static function  insertar_admin($nombre, $email,$usuario, $encrypt_pass,$rol) {
        $conexion = self::conn();
    
        // Insertar datos en users_data
        $sentencia_data = 'INSERT INTO users_data (nombre, email) VALUES (:nombre, :email)';
        $consulta_data = $conexion->prepare($sentencia_data);
        $consulta_data->bindParam(":nombre", $nombre);
        $consulta_data->bindParam(":email", $email);
        $consulta_data->execute();
        $consulta_data->closeCursor();
    
        // Obtener el ID del usuario recién insertado
        $idUsuario = $conexion->lastInsertId();
    
        // Insertar datos en users_login
        $sentencia_login = 'INSERT INTO users_login (IdUser,usuario, password, rol) VALUES (:idUser,:usuario, :password, :rol)';
        $consulta_login = $conexion->prepare($sentencia_login);
        $consulta_login->bindParam(":idUser", $idUsuario);
        $consulta_login->bindParam(":password", $encrypt_pass);
        $consulta_login->bindParam(":usuario", $usuario);
        $consulta_login->bindParam(":rol", $rol);
        $consulta_login->execute();
        $consulta_login->closeCursor();
    
        $conexion = null;
        // echo "registro insertado";
    }
    
    public static function actualizar($id,$contrasena) {
        $conexion = self::conn();
        $sentencia = "UPDATE users_login SET password = :contrasena WHERE idUser = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":contrasena", $contrasena);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        echo "Registro actualizado correctamente.";
    }
    public static function actualizar_cita($id,$fecha) {
        $conexion = self::conn();
        $sentencia = "UPDATE citas SET fecha_cita = :fecha WHERE idCita = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":fecha", $fecha);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        echo "Registro actualizado correctamente.";
    }

    
    public static function borrar($usuario) {

        $conexion = self::conn();
        $sentencia = "DELETE FROM users_login WHERE usuario = :usuario ";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":usuario", $usuario);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        echo "registro borrado";
    }

   public static function borrarId($id) {

        $conexion = self::conn();
        $sentencia = "DELETE FROM users_login WHERE idUser = :idUser ";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":idUser", $id);
        $consulta->execute();
        $consulta->closeCursor();

        $sentencia2 = "DELETE FROM users_data WHERE idUser = :idUser ";
        $consulta = $conexion->prepare($sentencia2);
        $consulta->bindParam(":idUser", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        echo 'registro borrado';
    }
   public static function borrarId_noticia($id) {

        $conexion = self::conn();
        $sentencia = "DELETE FROM noticias WHERE idNoticia = :idNoticia ";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":idNoticia", $id);
        $consulta->execute();
        $consulta->closeCursor();


        echo 'registro borrado';
    }
   public static function borrarId_cita($id) {

        $conexion = self::conn();
        $sentencia = "DELETE FROM citas WHERE idCita = :idCita ";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":idCita", $id);
        $consulta->execute();
        $consulta->closeCursor();


        echo 'registro borrado';
    }
  public static function insertar_noticia($titulo, $imagen, $texto, $fecha,$idUser){
        $conexion = self::conn();
        $sentencia = 'INSERT INTO noticias(titulo,imagen,texto,fecha,idUser) VALUES (:titulo,:imagen,:texto, :fecha,:idUser)';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":titulo", $titulo);
        $consulta->bindParam(":imagen", $imagen);
        $consulta->bindParam(":texto", $texto);
        $consulta->bindParam(":fecha", $fecha);
        $consulta->bindParam(":idUser", $idUser);
        $consulta->execute();
        $consulta->closeCursor();
    
        $conexion = null;
        echo 'Noticia subida';
  }  
  public static function insertar_cita($fecha, $motivo,$idUser){
        $conexion = self::conn();
        $sentencia = 'INSERT INTO citas(fecha_cita,motivo_cita,idUser) VALUES (:fecha,:motivo,:idUser)';
        $consulta = $conexion->prepare($sentencia);
        
        $consulta->bindParam(":fecha", $fecha);
        $consulta->bindParam(":motivo", $motivo);
        $consulta->bindParam(":idUser", $idUser);
        $consulta->execute();
        $consulta->closeCursor();
    
        $conexion = null;
        echo 'Cita subida';
  }  
    
}