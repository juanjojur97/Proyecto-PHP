<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los usuarios</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
        $todos = $cliente->verTodosUsuarios();
        foreach ($todos as $value) {
            ?>
        <div class="cliente">
            <a href="router.php?pag=detalle&id=<?php echo $value->idUser ?>"><?php echo $value->nombre. " " .$value->apellidos ?></a> ||
            <a href="router.php?pag=borrado&id=<?php echo $value->idUser ?>">Borrar</a> ||
            <a href="router.php?pag=actualiza&id=<?php echo $value->idUser ?>"> Actualizar </a><br>
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