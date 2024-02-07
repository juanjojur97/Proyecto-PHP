<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoTechnologies</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <?php
    session_start();
    $datos = null;
    if (isset($_SESSION['usuario'])) {
        $datos = $_SESSION['usuario'];
    }
    ?>
    <div class="container">
        <header class="my_header">
            <a href="../views/home.php"><h1><img src="../assets/images/logo1.png" alt="Logo" class="logo"></h1></a>
            <nav class="navigationBar">
                <ul class="navigationBarList">
                    <li>
                        <a href="#" class="enlace active">Inicio</a>
                    </li>
                    <li>
                        <a href="../views/noticias_user.php" class="enlace">Noticias</a>
                    </li>
                    <li>
                        <a href="../Admin/control_panel.php" class="enlace">Panel de Control</a>
                    </li>
                    
                </ul>
            </nav>
        </header>
        <main class="my_main">
            <section class="info">
                <h2>InfoTechnologies - Tu tienda tecnológica de confianza</h2>
                <p>Informática - Desarrollo de Software - Creación de sitios web - Impresión 3D</p>
            </section>
            <section>
                <div class="services">
                    <div class="service">
                        <h3>Creación de paginas web</h3>
                        <p>Creación desde 0 de forma personalizada de una página web, ya sea personal comercio eléctronico...Además de su soporte y mantenimiento.</p>
                    </div>
                    <div class="service">
                        <h3>Desarrollo de software personalizado</h3>
                        <p>Instalación, formación y configuración de nuestros programas,desarrollo de aplicaciones y software a medida.</p>
                    </div>
                    <div class="service">
                        <h3>Soluciones Informáticas</h3> 
                        <p>Arreglos de ordenadores, montaje de ordenadores, venta de hardware o productos informáticos y electronicos, soporto o ayuda con cualquier duda.</p>  
                        
                    </div>
                </div>
            </section>
            <p class="info dudas">Cualquier duda contacta con nosotros.</p>
        </main>
        <footer class="my_footer">
            <div class="aviso_legal">
                <h6>
                    &copy; InfoTechnologies - Todos los derechos reservados.
                </h6>
            </div>    
            <div class="social">
                    <a href="#">Instagram</a>
                    <a href="#">Linkedin</a>
            </div>
        </footer>
    </div>
</body>

</html>