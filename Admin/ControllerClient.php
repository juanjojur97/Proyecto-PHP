<?php
include './DB.php';
class ControllerClient{

    public function __construct(){
        if($_SESSION['usuario']['rol'] != "user"){
            header('Location: ../views/login.php');
            exit();
        }
    }

    public function verMisDatos(){
        $id = $_SESSION['usuario']['idUser'];
        return DB::buscarID($id);
    }
    public function verMisCitas(){
        $id = $_SESSION['usuario']['idUser'];
        return DB::buscarID_cita($id);
    }
    

}