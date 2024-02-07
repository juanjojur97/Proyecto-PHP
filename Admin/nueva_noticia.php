<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Insertar noticia</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
    session_start();
    $idUser = $_SESSION['usuario']['idUser'];
    if ($_SESSION['usuario']['rol'] != "admin") {
        header(('location:../login.php'));
        exit();
    }



    ?>

    <h1>Insertar Noticia</h1>
    <div class="formulario">
        <form action="action.php" id="noticia" class="mi_form" method="post">
            <div class="form_options">
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Escriba su titulo...">
            </div>
            <div class="form_options">
                <label for="imagen">Imagen: </label>
                <input type="text" id="imagen" name="imagen" placeholder="Escriba el nombre de la imagen.jpg">
            </div>
            <div class="form_options">
                <label for="texto">Texto: </label>
                <textarea id="texto" name="texto" rows="4" cols="50"
                    placeholder="Escriba su texto de la noticia..."></textarea>
            </div>
            <div class="form_options">
                <label for="fecha">Fecha </label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
            <div class="form_button">
                <input type="reset" value="Borrar">
                <input type="submit" name="noticia" value="Subir noticia">
            </div>
            <input type="hidden" name="accion" value="regnoticia">
        </form>
    </div>



    
</body>

</html>