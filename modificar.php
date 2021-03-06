<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    //Objetos
    $empleado = new Empleado();

    if (!isset($_POST['enviar']) && !isset($_POST['cancelar'])){
        //Se recogen los datos del usuario que se va a modificar
        $fila = $empleado->mostrarEmpleado($_GET['id']);
    }else{
        //Se envian los datos modificados al método
        if(isset($_POST['enviar']))
            if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {
                $empleado->modificarEmpleado($_POST['id'], $_POST['dni'], $_POST['nombre'], $_POST['correo'], $_POST['telf']);
            }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Modificar | BDEmpleados';
        $css = 'alta';

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
                $pagina = 'modificar';

                barraLateral($pagina);

            ?>
            <section>
                <h1>MODIFICAR</h1>
                <!-- FORMULARIO MODIFICACIÓN EMPLEADO -->
                <form action="modificar.php" method="post">
                    <!-- DNI -->
                    <div class="row">
                        <div class="col-25">
                            <label for="dni">DNI: </label>
                        </div>
                        <div class="col-75">
                            <?php
                                echo '<input type="text" name="dni" required value="'.$fila['dni'].'" />';
                            ?>
                        </div>
                    </div>
                    <!-- NOMBRE -->
                    <div class="row">
                        <div class="col-25">
                            <label for="nombre">Nombre: </label>
                        </div>
                        <div class="col-75">
                            <?php
                                echo '<input type="text" name="nombre" required value="'.$fila['nombre'].'" />';
                            ?>
                        </div>
                    </div class="row">
                    <!-- CORREO -->
                    <div class="row">
                        <div class="col-25">
                            <label for="correo">Correo: </label>
                        </div>
                        <div class="col-75">
                            <?php
                                echo '<input type="text" name="correo" value="'.$fila['correo'].'" />';
                            ?>
                        </div>
                    </div>
                    <!-- TELÉFONO -->
                    <div class="row">
                        <div class="col-25">
                            <label for="telf">Teléfono: </label>
                        </div>
                        <div class="col-75">
                            <?php
                                echo '<input type="text" name="telf" required value="'.$fila['telefono'].'" />';
                            ?>
                        </div>
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
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>