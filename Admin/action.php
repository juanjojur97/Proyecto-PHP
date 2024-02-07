<?php
session_start();



include './DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    if ($accion === 'regusuario') {
        // Obtén los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $pass = htmlspecialchars($_POST['password']);
        $contrasena = password_hash($pass, PASSWORD_BCRYPT);
        $rol = $_POST['rol'];

        // Verifica si es una actualización o una inserción
        if (isset($_POST['reg-act'])) {
            // Actualización de usuario
            $id = $_POST['reg-act'];
            // Lógica para actualizar el usuario en la base de datos
            DB::actualizar($id, $contrasena);
            echo "Usuario actualizado correctamente.";
        } else {
            // Inserción de nuevo usuario
            // Lógica para insertar el usuario en la base de datos
            DB::insertar_admin($nombre, $email,$usuario, $contrasena, $rol);
            echo "Usuario insertado correctamente.";
        }
    }
    if ($accion === 'regnoticia') {
        // Obtén los datos del formulario
        if ($_POST['noticia']) {
            $titulo = htmlspecialchars($_POST['titulo']);
            $imagen = htmlspecialchars($_POST['imagen']);
            $texto = htmlspecialchars($_POST['texto']);
            $fecha = htmlspecialchars($_POST['fecha']);
            $idUser = $_POST['idUser'];
            DB::insertar_noticia($titulo,$imagen,$texto,$fecha,$idUser);
            echo "noticia insertada";
        }
        
    }
    if ($accion === 'regcita') {
        // Obtén los datos del formulario
        if ($_POST['cita']) {
            
            $fecha = htmlspecialchars($_POST['fecha_cita']);
            $motivo = htmlspecialchars($_POST['motivo_cita']);
            $idUser = $_POST['idUser'];
            DB::insertar_cita($fecha,$motivo,$idUser);
            echo "noticia insertada";
        }
        
    }
    if ($accion === 'actcita') {
        // Obtén los datos del formulario
        if ($_POST['cita']) {
            $fecha = htmlspecialchars($_POST['fecha_cita']);
            $id = $_POST['idUser'];
            DB::actualizar_cita($id,$fecha);
            echo "cita actualizada";
        }
        
    }
}
?>
<br>
<a href="control_panel.php">Volver al panel de control</a>
