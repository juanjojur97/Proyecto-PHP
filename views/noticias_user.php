<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoTechnologies</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <header class="my_header">
            <a href="../views/home.php"><h1><img src="../assets/images/logo1.png" alt="Logo" class="logo"></h1></a>
            <nav class="navigationBar">
                <ul class="navigationBarList">
                    <li>
                        <a href="../views/home.php" class="enlace">Inicio</a>
                    </li>
                    <li>
                        <a href="#" class="enlace active">Noticias</a>
                    </li>
                    <li>
                        <a href="../Admin/control_panel.php" class="enlace">Panel de Control</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="my_main_noticias">
            <?php
            include '../Admin/DB.php';
            $noticias = DB::verNoticias();
            foreach ($noticias as $item) {
                echo "<h2>" . $item->titulo . "</h2>";
                echo "<div class='noticia'>";
                    echo "<img src='../assets/images/" . $item->imagen . "' alt= 'imagen'>";
                    echo "<p>" . $item->texto . "</p>";
                echo "</div>";
            }
                ?>
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