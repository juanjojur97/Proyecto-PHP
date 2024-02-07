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
                        <a href="#" class="enlace active">Registro</a>
                    </li>
                    <li>
                        <a href="login.php" class="enlace">Login</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="my_main">
            <section class="info">
                <h2>Registrate</h2>  
                <?php
                    $registro = null;
                    if(isset($_GET['registro'])){
                        $registro = $_GET['registro'];
                    }
                ?>
                <div>
                    <?php echo ($registro == "ko")?"El usuario ya existe.":"";?>
                </div>
            </section>
            <section>
   
                <div class="formulario">
                    <form action="../routers/router.php" id="registro" class="mi_form" method="post" form-control>                   
                        <div class="form_options ">
                            <label for="user_name">*Nombre: </label>
                            <input type="text" id="user_name" name="user_name" placeholder="Escriba su nombre..." class="valida">
                            <!-- <small>Error mensaje</small> -->
                        </div>
                        <div class="form_options">
                            <label for="user_apellidos">*Apellidos: </label>
                            <input type="text" id="user_apellidos" name="user_apellidos" placeholder="Escriba sus apellidos..." class="valida">
                            <!-- <small>Error mensaje</small> -->
                        </div>
                        <div class="form_options">
                            <label for="user_email">*Email: </label>
                            <input type="email" id="user_email" name="user_email" placeholder="Escriba su email..." class="valida">
                            <!-- <small>Error mensaje</small> -->
                        </div>
                        <div class="form_options">
                            <label for="user_tel">Teléfono: </label>
                            <input type="tel" id="user_tel" name="user_tel" placeholder="Escriba su teléfono...">
                        </div>
                        <div class="form_options">
                            <label for="user_fnac">Fecha de nacimiento: </label>
                            <input type="date" id="user_fnac" name="user_fnac">
                        </div>
                        <div class="form_options">
                            <label for="user_dir">Dirección: </label>
                            <input type="text" id="user_dir" name="user_dir">
                        </div>
                        <div class="form_options">
                            <label for="user_sexo">Sexo: </label>
                            <select id="user_sexo" name="user_sexo">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form_options">
                            <label for="user_user">Usuario: </label>
                            <input type="text" id="user_user" name="user_user" placeholder="Escriba su nombre de usuario">
                        </div>
                        <div class="form_options">
                            <label for="user_password">Contraseña: </label>
                            <input type="password" id="user_password" name="user_password" placeholder="Escriba su contraseña...">
                        </div>
                        <div class="password_show">
                            <label for="">Mostrar contraseña</label>
                            <input type="checkbox" id="check_password">
                        </div>
                        <div class="form_button">
                            <input type="reset" value="Borrar">
                            <input type="submit" name="registrarse" value="Registrarse">
                        </div>
                        
                           
                    </form>
                </div>
                
            </section>
            <p class="info">Si ya tienes una cuenta, haz click aqui.<a class="enlace" href="login.php">Iniciar Sesión</a></p> 
                
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
<script src="../assets/js/validar.js"></script>
</body>
</html>