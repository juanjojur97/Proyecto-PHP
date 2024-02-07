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
            echo 'No hay acceso 1.';
        }
        
        if ($datos['rol'] == "user") {
            include './ControllerClient.php';
            $uno1 = new ControllerClient();
            $unico_user = $uno1->verMisDatos();
            foreach ($unico_user as $value) {
                ?>
        <div class="cliente" >
            <a href="router.php?pag=detalle&id=<?php echo $value->idUser ?>"> <?php echo $value->nombre ?> </a> | 
            <a href="router.php?pag=borrado&id=<?php echo $value->idUser ?>"> Borrar </a> | 
            <a href="router.php?pag=actualiza&id=<?php echo $value->idUser ?>"> Actualizar </a><br>
        </div>
                <?php
            }
        } else {
            echo 'No hay acceso 2.';
            exit();
        }
        ?>
    </body>
</html>
