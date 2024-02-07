<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Todos las noticias</title>
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
        $todos = $cliente->verTodasNoticias();
        foreach ($todos as $value) {
            ?>
        <div class="cliente">
            <a href="router.php?pag=detalle_not&id=<?php echo $value->idNoticia ?>"><?php echo $value->titulo ?></a> ||
            <a href="router.php?pag=borrado_not&id=<?php echo $value->idNoticia ?>">Borrar</a> ||
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