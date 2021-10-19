<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    if (isset($_POST['enviar'])){
        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {
            $empleado = new Empleado();
            $empleado->anadirEmpleado($_POST['dni'], $_POST['nombre'], $_POST['correo'], $_POST['telf']);
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Añadir | BDEmpleados';
        $css = 'index';

        cabeceraPrincipal($titulo, $css);

    ?>
	<body>
        <?php

            //Variables
            $pagina = 'index';

            barraNavegacion($pagina);

        ?>
        <!-- FORMULARIO DE ALTA A EMPLEADO -->
        <form action="index.php" method="post">
            <!-- DNI -->
            <div>
                <label for="dni">DNI: </label>
                <input type="text" name="dni" required />
            </div>
            <!-- NOMBRE -->
            <div>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" required />
            </div>
            <!-- CORREO -->
            <div>
                <label for="correo">Correo: </label>
                <input type="text" name="correo" />
            </div>
            <!-- TELÉFONO -->
            <div>
                <label for="telf">Teléfono: </label>
                <input type="text" name="telf" required />
            </div>
            <!-- BOTONES -->
            <div id="botones">
                <input type="submit" name="enviar" value="ENVIAR" />
                <input type="reset" name="cancelar" value="CANCELAR" />
            </div>
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
