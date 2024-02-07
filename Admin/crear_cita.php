<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoTechnologies</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php
    session_start();
    $idUser = $_SESSION['usuario']['idUser'];
    ?>

    </section>
    <section>

        <div class="formulario">
            <form action="action.php" id="cita" class="mi_form" method="post">
                <div class="form_options">
                    <label for="fecha_cita">Fecha: </label>
                    <input type="date" id="fecha_cita" name="fecha_cita">
                </div>
                <div class="form_options">
                    <label for="motivo_cita">Motivo: </label>
                    <textarea name="motivo_cita" id="motivo_cita" cols="30" rows="10"></textarea>
                </div>
                <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
                <div class="form_button">
                    <input type="reset" value="Borrar">
                    <input type="submit" name="cita" value="Enviar">
                </div>
                <input type="hidden" name="accion" value="regcita">

            </form>
        </div>

    </section>

    </main>

    </div>

</body>

</html>