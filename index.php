<?php

    //IMPORTACIONES
    require_once 'empleado.php';

    if (isset($_POST['enviar'])){
        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {
            $empleado = new Empleado($_POST['dni'], $_POST['nombre'], $_POST['correo']), $_POST['telf']));
            $empleado->anadirEmpleado();
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="rtorresgutierrez.guadalupe@alumnado.fundacionloyola.net" />
        <title>BDEmpleados</title>
    </head>
    <body>
        <!-- FORMULARIO DE ALTA A EMPLEADO -->
        <form action="index.php" method="post">
            <!-- DNI -->
            <label for="dni">DNI: </label>
            <input type="text" name="dni" required /><br /><br />
            <!-- NOMBRE -->
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" required /><br /><br />
            <!-- CORREO -->
            <label for="correo">Correo: </label>
            <input type="text" name="correo" /><br /><br />
            <!-- TELÉFONO -->
            <label for="telf">Teléfono: </label>
            <input type="text" name="telf" required /><br /><br />
            <!-- BOTONES -->
            <input type="submit" name="enviar" value="ENVIAR" />
            <input type="reset" name="cancelar" value="CANCELAR" />
        </form>
    </body>
</html>
    <?php

        // if (isset($_POST['enviar'])){
        //     if (!empty($_POST['nombre'])) {
        //         $sql = "SELECT * FROM alumno WHERE Nombre LIKE '%" . implode(' ', array_filter(explode(' ', $_POST['nombre']))) . "%';";
        //         $resultado = $mysqli -> query($sql);
        //         if ($resultado -> num_rows > 0) {
        //             while ($fila = $resultado -> fetch_array()) {
        //                 echo $fila['NumAlumno'] . ': ';
        //                 echo $fila['Nombre'] . ' | ';
        //                 if ($fila['Repite'] == 0)
        //                     echo 'El alumno NO repite.';
        //                 else echo 'El alumno repite';
        //                 echo '<br />';
        //             }
        //         }else echo 'No se han encontrado resultados';
        //     }else echo 'El campo está vacío.';
        // }
        // $mysqli -> close();

    ?>
