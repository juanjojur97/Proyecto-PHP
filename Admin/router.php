<?php
if ($_GET['session'] == "ko") {
    session_destroy();
    header('Location: ../views/login.php');
    exit();
}
if ($_GET['datos'] == "todos") {
    session_destroy();
    header('Location: ../Admin/listado_todos.php');
    exit();
}
if($_GET['datos'] == "todos_not"){
    session_destroy();
    header('Location: ../Admin/listado_noticias.php');
    exit();
}
if($_GET['datos'] == "todos_citas"){
    session_destroy();
    header('Location: ../Admin/listado_todas_citas.php');
    exit();
}
if ($_GET['datos'] == "unico") {
    header(('location:../Admin/listadounico.php'));
}
if ($_GET['datos'] == "unico_user") {
    header(('location:./listadounico_user.php'));
}
if ($_GET['datos'] == "unico_cita") {
    header(('location:./listado_cita_unico.php'));
}
if ($_GET['pag'] == "detalle") {
    header('Location: ./detalle.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "detalle_not") {
    header('Location: ./detalle_noticia.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "detalle_cita") {
    header('Location: ./detalle_cita.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "borrado") {
    header('Location: ./borrado.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "borrado_not") {
    header('Location: ./borrado_noticia.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "borrado_cita") {
    header('Location: ./borrado_cita.php?id=' . $_GET['id']);
}
if ($_GET['pag'] == "inserta") {
    header('Location: ./insertar_usuario.php?id=no');
}
if ($_GET['pag'] == "actualiza") {
    header('Location: ./insertar_usuario.php?id=' . $_GET['id']);
}
if ($_GET['accion'] == "regusuario") {
    //    header('location:./insertar_actualizar.php?id='.$_GET['id']);
}
if ($_GET['accion'] == "regnoticia") {
    header('location:./nueva_noticia.php?id='.$_GET['id']);
}
if ($_GET['accion'] == "regcita") {
    header('location:./crear_cita.php?id='.$_GET['id']);
}
if ($_GET['accion'] == "actcita") {
   
}
if ($_GET['pag'] == "act_cita") {
    header('location:./actualizar_cita.php?id='.$_GET['id']);
}




