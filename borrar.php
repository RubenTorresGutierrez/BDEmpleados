<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    if(isset($_POST['aceptar']) || isset($_POST['cancelar'])){
        if(isset($_POST['aceptar'])){
            $empleado = new Empleado();
            $empleado->borrarEmpleado($_POST['id']);
        }
        header("Location:index.php");
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
        <header>
            <h1>HEADER</h1>
        </header>
        <nav>
            <h1>NAV</h1>
        </nav>
        <main>
            <?php

                //Variables
                $pagina = 'borrar';

                barraLateral($pagina);

            ?>
            <section>
                <h1>BORRAR</h1>
                <form action="borrar.php" method="post">
                    <legend>¡ATENCIÓN!</legend>
                    <label for="">¿Desea eliminar al<br />empleado seleccionado?</label>
                    <?php
                        echo '<input type="hidden" name="id" value="'.$_GET['id'].'" />';
                    ?>
                    <div id="botones">
                        <input type="submit" name="aceptar" value="Aceptar" />
                        <input type="submit" name="cancelar" value="Cancelar" />
                    </div>
                </form>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>