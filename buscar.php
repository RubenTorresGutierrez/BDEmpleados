<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    function buscar(){

        if(isset($_POST['buscar'])){

            $empleado = new Empleado();
            $empleado->buscarEmpleado($_POST['campo'], $_POST['dato']);
            
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Buscar | BDEmpleados';
        $css = 'index';

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
                $pagina = 'buscar';

                barraLateral($pagina);

            ?>
            <section>
                <h1>BUSCAR</h1>
                <!-- BUSCADOR -->
                <form action="buscar.php" method="post">
                    <div>
                        <select name="campo">
                            <option value="dni">DNI</option>
                            <option value="nombre">Nombre</option>
                            <option value="correo">Correo</option>
                            <option value="telefono">Teléfono</option>
                        </select>
                    </div>
                    <div>
                        <img src="img/icons/lupa.png" alt="Lupa" />
                        <input type="text" name="dato" placeholder="Buscar..." />
                        <input type="submit" value="BUSCAR" name="buscar" />
                    </div>
                </form>
                <!-- TABLA -->
                <?php

                    buscar();

                ?>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>