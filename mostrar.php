<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    $empleado = new Empleado();
    $resultado = $empleado->mostrarEmpleados();

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Mostrar | BDEmpleados';
        $css = 'mostrar';

        cabeceraPrincipal($titulo, $css);

    ?>
	<body>
        <?php

            //Variables
            $pagina = 'mostrar';

            barraNavegacion($pagina);

        ?>
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
                                '<td><a href=""><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
                                '<td><a href=""><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
                            '</tr>';
                    }
                }

            ?>
        </table>
    </body>
</html>