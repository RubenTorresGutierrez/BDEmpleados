<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    //Se envian los datos al método
    if (isset($_POST['enviar']))
        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {

            $empleado = new Empleado();
            $empleado->altaEmpleado($_POST['dni'], $_POST['nombre'], $_POST['correo'], $_POST['telf']);
            
        }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Añadir | BDEmpleados';
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
                $pagina = 'alta';

                barraLateral($pagina);

            ?>
            <section>
                <h1>ALTA</h1>
                <!-- FORMULARIO DE ALTA A EMPLEADO -->
                <form action="alta.php" method="post">
                    <!-- DNI -->
                    <div class="row">
                        <div class="col-25">
                            <label for="dni">DNI: </label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="dni" required />
                        </div>
                    </div>
                    <!-- NOMBRE -->
                    <div class="row">
                        <div class="col-25">
                            <label for="nombre">Nombre: </label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="nombre" required />
                        </div>
                    </div>
                    <!-- CORREO -->
                    <div class="row">
                        <div class="col-25">
                            <label for="correo">Correo: </label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="correo" />
                        </div>
                    </div>
                    <!-- TELÉFONO -->
                    <div class="row">
                        <div class="col-25">
                            <label for="telf">Teléfono: </label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="telf" required />
                        </div>
                    </div>
                    <!-- BOTONES -->
                    <div id="botones">
                        <input type="submit" name="enviar" value="ENVIAR" />
                        <input type="reset" name="cancelar" value="CANCELAR" />
                    </div>
                </form>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>