<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    //Objetos
    $empleado = new Empleado();

    if (!isset($_POST['enviar']) && !isset($_POST['cancelar'])){
        //Se recogen los datos del usuario que se va a modificar
        $resultado = $empleado->mostrarEmpleado($_GET['id']);
        $fila = $resultado->fetch_array();
    }else{
        //Se envian los datos modificados al método
        if(isset($_POST['enviar']))
            if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {
                $empleado->modificarEmpleado($_POST['id'], $_POST['dni'], $_POST['nombre'], $_POST['correo'], $_POST['telf']);
            }
        header("Location:mostrar.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Modificar | BDEmpleados';
        $css = 'index';

        cabeceraPrincipal($titulo, $css);

    ?>
	<body>
        <?php

            //Variables
            $pagina = 'modificar';

            barraNavegacion($pagina);

        ?>
        <!-- FORMULARIO DE ALTA A EMPLEADO -->
        <form action="modificar.php" method="post">
            <!-- DNI -->
            <div>
                <label for="dni">DNI: </label>
                <?php
                    echo '<input type="text" name="dni" required value="'.$fila['dni'].'" />';
                ?>
            </div>
            <!-- NOMBRE -->
            <div>
                <label for="nombre">Nombre: </label>
                <?php
                    echo '<input type="text" name="nombre" required value="'.$fila['nombre'].'" />';
                ?>
            </div>
            <!-- CORREO -->
            <div>
                <label for="correo">Correo: </label>
                <?php
                    echo '<input type="text" name="correo" value="'.$fila['correo'].'" />';
                ?>
            </div>
            <!-- TELÉFONO -->
            <div>
                <label for="telf">Teléfono: </label>
                <?php
                    echo '<input type="text" name="telf" required value="'.$fila['telefono'].'" />';
                ?>
            </div>
            <?php
                echo '<input type="hidden" name="id" value="'.$_GET['id'].'" />';
            ?>
            <!-- BOTONES -->
            <div id="botones">
                <input type="submit" name="enviar" value="ACTUALIZAR" />
                <input type="submit" name="cancelar" value="CANCELAR" />
            </div>
        </form>
    </body>
</html>