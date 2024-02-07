<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Citas</title>
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
            $unico_user = $uno1->verMisCitas();
            foreach ($unico_user as $value) {
                ?>
        <div class="cliente" >
            <a href="router.php?pag=detalle_cita&id=<?php echo $value->idUser ?>"> <?php echo $value->fecha_cita?> </a> | 
            <a href="router.php?pag=borrado_cita&id=<?php echo $value->idCita ?>"> Borrar </a> | 
            <a href="router.php?pag=actualiza&id=<?php echo $value->idCita ?>"> Actualizar </a><br>
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