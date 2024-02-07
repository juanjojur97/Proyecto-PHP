<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
    session_start();

    $cliente = null;
    $datos = null;
    if (isset($_SESSION['usuario'])) {
        $datos = $_SESSION['usuario'];
    }
    
    
    if($datos['rol'] == "admin"){
        include './ControllerAdmin.php';
        $cliente =  new ControllerAdmin();
    }elseif($datos['rol'] == "user"){
        include './ControllerClient.php';
        $cliente = new ControllerClient();
    }else{
        header('Location:../views/login.php?login=ko');
        exit();
    }

    if($datos['rol'] == "admin"){
        ?>
    <div class="body">  
        <div class="container_panel">        
            <nav class="navigationBar_panel">
                <ul class="navigationBarList_panel">
                    <li>
                        <a href="../views/home.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../views/noticias_user.php">Noticias</a>       
                    </li>
                    <li>
                        <a href="router.php?pag=inserta">Nuevo usuario</a>   
                    </li>
                    <li>
                        <a href="router.php?datos=todos">Ver todos los clientes</a>
                    </li>    
                    <li>
                        <a href="router.php?datos=unico">Ver mis Datos</a>               
                    </li>
                    <li>
                        <a href="router.php?accion=regnoticia">Insertar Noticia</a>        
                    </li>           
                    <li>
                        <a href="router.php?datos=todos_not">Ver todas las noticias</a>
                    </li>
                    <li>
                        <a href="router.php?datos=todos_citas">Ver todas las citas</a>
                    </li>
                    <li>
                        <a href="router.php?session=ko">Cerrar Sesión</a>
                    </li>
                </ul>
            </nav>  
        </div> 
    </div>          
        <?php
        


    }

    if($datos['rol'] == "user"){
        ?>
    <div class="body">  
        <div class="container_panel">        
            <nav class="navigationBar_panel">
                <ul class="navigationBarList_panel">    
                    <li>
                        <a href="../views/home.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../views/noticias_user.php">Noticias</a>
                    </li>
                    <li>
                        <a href="router.php?datos=unico_user">Ver mis Datos</a> 
                    </li>    
                    <li>
                        <a href="router.php?accion=regcita">Pedir cita</a>
                    </li>
                    <li>
                        <a href="router.php?datos=unico_cita">Mis citas</a>
                    </li>
                    <li>
                        <a href="router.php?session=ko">Cerrar Sesión</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>                
        <?php
    }


        ?>
    <hr>
    


    




</body>

</html>