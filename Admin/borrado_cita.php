<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include './DB.php';
    $usuario = DB::borrarId_cita($_GET['id']);

    ?>
</body>

</html>