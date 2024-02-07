<?php
include '../Models/DB.php';
class ControllerLogin{
    /**
     * Constructor
     */
    public function __construct(){
        session_start();


    }

    public function insertarUsuario($nombre,$apellidos,$email,$telefono,$fechaNac,$direccion,$sexo,$usuario,$encrypt_pass){
        $result = $this -> buscarUsuario($email);
        if($result[0]){
            header('location:../views/registro.php?registro=ko');
            exit();
        }else{
            DB::insertar($nombre, $apellidos, $email, $telefono, $fechaNac, $direccion, $sexo, $usuario, $encrypt_pass);
            $user = DB::comprobarUsuarioB($usuario);
            $_SESSION['usuario'] = [$user[0]->idUser,$user[0]->usuario,$user[0]->rol];
            header('location:../Admin/control_panel.php?registro=ok');
        }
    }
    

    /**
     * deuelve true si encuentra el usuario
     * Busca usuario
     */
    public function buscarUsuario($email){
        $found = false;
        $result = DB::comprobarUsuario($email);
        if(count($result)===1){
            $found = true;
        }
        return [$found];
    }

    public function comprobarUsuario1($usuario,$encrypt_pass = null){
        //si encuentra el usuario la variable login devuelve true
        $found = false;
        $result = DB::comprobarUsuarioB($usuario);
        if(count ($result) === 1){
            if($usuario === $result[0]->usuario && password_verify($encrypt_pass,$result[0] -> password)){
                $found = true;
            }
        }
        return [$found, ['idUser' => $result[0]->idUser, 'rol'=>$result[0]->rol]];
    }
    

    public function login($usuario,$encrypt_pass){
        $login = $this -> comprobarUsuario1($usuario,$encrypt_pass);
        if($login[0]){
            $_SESSION['usuario'] = $login[1];
            header('Location:../Admin/control_panel.php?login=ok');
        }else{
            header('Location:../views/login.php?login=ko');
            exit();
        }
    }
}