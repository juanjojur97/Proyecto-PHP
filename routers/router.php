<?php
include '../Controllers/ControllerLogin.php';
if($_POST['registrarse']){
    $nombre = htmlspecialchars($_POST['user_name']);
    $apellidos = htmlspecialchars($_POST['user_apellidos']);
    $email = filter_input(INPUT_POST,'user_email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'user_tel', FILTER_SANITIZE_NUMBER_INT);
    $fechaNac = htmlspecialchars($_POST['user_fnac']);
    $direccion = htmlspecialchars($_POST['user_dir']);
    $sexo = filter_input(INPUT_POST, 'user_sexo', FILTER_VALIDATE_REGEXP, array(
        'options' => array(
            'regexp' => '/^(Masculino|Femenino)$/i',
        ),
    ));
    $usuario = htmlspecialchars($_POST['user_user']);
    $pass = htmlspecialchars($_POST['user_password']);
    $encrypt_pass = password_hash($pass,PASSWORD_BCRYPT);

    $ins = new ControllerLogin();
    $ins -> insertarUsuario($nombre,$apellidos,$email,$telefono,$fechaNac,$direccion,$sexo,$usuario,$encrypt_pass);
    unset($ins);
}
if($_POST['login']){
    $usuario = htmlspecialchars($_POST['user_user']);
    $encrypt_pass = htmlspecialchars($_POST['user_password_login']);
    $log = new ControllerLogin();
    $log -> login($usuario,$encrypt_pass);
    unset($log);
}



