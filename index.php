<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    $empleado = new Empleado();
    $resultado = $empleado->mostrarEmpleados();

    //Cerrar conexión
    $empleado->cerrarConexion();

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

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_array()) {
                                echo '<tr>'.
                                        '<td>' . $fila['dni'] . '</td>'.
                                        '<td>' . $fila['nombre'] . '</td>'.
                                        '<td>' . $fila['correo'] . '</td>'.
                                        '<td>' . $fila['telefono'] . '</td>'.
                                        '<td><a href="modificar.php?id='.$fila['idEmpleado'].'"><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
                                        '<td><a href="borrar.php?id='.$fila['idEmpleado'].'"><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
                                    '</tr>';
                            }
                        }

                    ?>
                </table>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>