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
            <a href="../index.php"><h1><img src="../assets/images/logo1.png" alt="Logo" class="logo"></h1></a>
            <nav class="navigationBar">
                <ul class="navigationBarList">
                    <li>
                        <a href="../index.php" class="enlace">Inicio</a>
                    </li>
                    <li>
                        <a href="noticias.php" class="enlace">Noticias</a>
                    </li>
                    <li>
                        <a href="registro.php" class="enlace">Registro</a>
                    </li>
                    <li>
                        <a href="#" class="enlace active">Login</a>
                    </li>
                    </ul>
            </nav>
        </header>
        <main class="p_login">
            <section class="info">
                <h2>Iniciar Sesión</h2>  
            </section>
            <section>
                <div class="formulario">
                    <form action="../routers/router.php" id="login" class="mi_form" method="post">
                        <div class="form_options">
                            <label for="user_user">Usuario: </label>
                            <input type="text" id="user_user" name="user_user" placeholder="Escriba su nombre de usuario">
                        </div>
                        <div class="form_options">
                            <label for="user_password">Contraseña: </label>
                            <input type="password" id="user_password" name="user_password_login" placeholder="Escriba su contraseña...">
                        </div>
                        <div class="form_button">
                            <input type="submit" name="login" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
                
            </section>
            <p class="info">Si no tienes una cuenta, haz click aqui para registrarte.<a class="enlace" href="registro.php">Registrate</a></p> 
                
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







<script src="../assets/js/registro.js"></script>
</body>
</html>