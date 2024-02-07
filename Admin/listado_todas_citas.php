<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Todos las citas</title>
</head>

<body>
    <?php
    session_start();

    $datos = null;
    if (isset($_SESSION['usuario'])) {
        $datos = $_SESSION['usuario'];
    } else {
        echo "No hay acceso";
    }
    if ($datos['rol'] == "admin") {
        include './ControllerAdmin.php';
        $cliente = new ControllerAdmin();
        $todos = $cliente->verTodasCitas();
        foreach ($todos as $value) {
            ?>
        <div class="cliente">
            <a href="router.php?pag=detalle_cita&id=<?php echo $value->idUser ?>"><?php echo "ID: ".$value->idUser. " Fecha: " .$value->fecha_cita ?></a> ||
            <a href="router.php?pag=borrado_cita&id=<?php echo $value->idCita ?>">Borrar</a> ||
            <a href="router.php?pag=act_cita&id=<?php echo $value->idUser ?>"> Actualizar </a><br>
        </div>
            <?php

        }

    } else {
        echo "No hay acceso";
        exit();
    }
    ?>



</body>

</html>