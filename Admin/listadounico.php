<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Perfil</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <?php
        session_start();
        $datos = NULL;

        if (isset($_SESSION['usuario'])) {
            $datos = $_SESSION['usuario'];
        } else {
            echo 'No hay acceso.';
        }
        
        if ($datos['rol'] == "admin") {
            include './ControllerAdmin.php';
            $uno = new ControllerAdmin();
            $unico = $uno->verMisDatos();
            foreach ($unico as $value) {
                ?>
        <div class="cliente">
            <a href="router.php?pag=detalle&id=<?php echo $value->idUser ?>"> <?php echo $value->nombre ?> </a> | 
            <a href="router.php?pag=borrado&id=<?php echo $value->idUser ?>"> Borrar </a> | 
            <a href="router.php?pag=actualiza&id=<?php echo $value->idUser ?>"> Actualizar </a><br>
        </div>    
                <?php
            }
        } else {
            echo 'No hay acceso.';
            exit();
        }
        ?>
    </body>
</html>