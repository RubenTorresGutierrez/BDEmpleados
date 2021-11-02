<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    //OBJETOS
    $empleado = new Empleado();
    
?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Mostrar | BDEmpleados';
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
                $pagina = 'index';

                barraLateral($pagina);

            ?>
            <section>
                <h1>MOSTRAR</h1>
                <table>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                    <?php
                        
                        $empleado->mostrarEmpleados();

                    ?>
                </table>
                <a href="decision.php?op=a">
                    <img src="img/icons/add.png" alt="Añadir" />
                    <h3>Añadir empleados</h3>
                </a>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>