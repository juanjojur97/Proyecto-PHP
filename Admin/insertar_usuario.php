<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Usuario</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION['usuario']['rol'] != "admin") {
            header(('location:../login.php'));
            exit();
        }

        $id = NULL;
        $usuario = NULL;
        if($_GET['id'] != 'no'){
            $id = $_GET['id'];
            include './DB.php';
            $usuario = DB::buscarID_update($id);
            
        }

        ?>
        
        <h1>
            <?php echo $id!=NULL ? 'Actualizacion de usuario' : 'Inserción de usuario' ?>
        </h1>
        
        <div class="formulario"></div>
            <form action="action.php" method="POST" class="mi_form">
                <div class="form_options">
                    <label>Nombre: </label>              
                    <input type="text" name="nombre" value="<?php echo $id!=NULL ? $usuario[0]->nombre : '' ?>">
                </div>
                <div class="form_options">
                    <label> Email: </label>
                    <input type="email" name="email" value="<?php echo $id!=NULL ? $usuario[0]->email : '' ?>">
                </div>
                <div class="form_options">
                    <label for="usuario">Usuario: </label>
                    <input type="usuario" name="usuario" value="" >
                </div>
                <div class="form_options">
                    <label> Contraseña: </label>
                    <input type="password" name="password" value="" >
                </div>
                <div>
                    <select name="rol">
                        <option value="admin">Administrador</option>
                        <option value="user" selected>Usuario</option>
                    </select>
                </div>  
                <div>
                    <input type="submit" value="Enviar">               
                </div>
                <input type="hidden" name="accion" value="regusuario">
                
                <?php
                if($id != NULL){
                ?>  
                
                <input type="hidden" name="reg-act" value="<?php echo $id  ?>">
                
                <?php
                
                }else{
                    ?>
                <input type="hidden" name="reg-ins" value="no">    
                    <?php
                }
                
                
                
                ?>
            </form>
        </div>    
    </body>
</html>