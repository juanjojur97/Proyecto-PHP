<?php
include './DB.php';
class ControllerAdmin{
   
    public function __construct(){
        if($_SESSION['usuario']['rol'] != "admin"){
            header('Location: ../views/login.php');
            exit();
        }
    }

    public function verMisDatos(){
        $id = $_SESSION['usuario']['idUser'];
        return DB::buscarID($id);
    }

    public function verTodosUsuarios(){
        $todoUsuarios = DB::verTodos();
        return $todoUsuarios;
    }
    public function verTodasNoticias(){
        $todoNoticias = DB::verNoticias();
        return $todoNoticias;
    }
    public function verTodasCitas(){
        $todoCitas = DB::verCitas();
        return $todoCitas;
    }

   
}