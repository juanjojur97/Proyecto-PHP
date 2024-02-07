<?php
    session_start();

    $datos = null;
    if (isset($_SESSION['usuario'])) {
        $datos = $_SESSION['usuario'];
    } else {
        echo "No hay acceso";
    }
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATOS PERSONALES DEL USUARIO</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="cliente">
    <?php

        include './DB.php';
        $usuario = DB::buscarID_cita($_GET['id']);
        echo $usuario[0]->fecha_cita. "<br>";
        echo $usuario[0]->motivo_cita. "<br>";
    ?>
    </div>
</body>
</html>