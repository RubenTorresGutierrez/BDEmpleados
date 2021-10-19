<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    if(isset($_POST['aceptar']) || isset($_POST['cancelar'])){
        if(isset($_POST['aceptar'])){
            $empleado = new Empleado();
            $empleado->borrarEmpleado($_POST['id']);
        }
        header("Location:mostrar.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Borrar empleado | BDEmpleados';
        $css = 'borrar';

        cabeceraPrincipal($titulo, $css);

    ?>
	<body>
        <section>
            <form action="borrar.php" method="post">
                <label for="">¿Desea eliminar al<br />empleado seleccionado?</label>
                <?php
                    echo '<input type="hidden" name="id" value="'.$_GET['id'].'" />';
                ?>
                <input type="submit" name="aceptar" value="Aceptar" />
                <input type="submit" name="cancelar" value="Cancelar" />
            </form>
        </section>
    </body>
</html>