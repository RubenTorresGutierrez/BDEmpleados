<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    function buscar(){

        if(isset($_POST['buscar'])){
            $empleado = new Empleado();

            //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
            $sql = 'SELECT * FROM empleado WHERE '.$_POST['campo'].' LIKE "%'.$_POST['dato'].'%";';
            
            //Mandar la consulta a la Base de Datos
            return $this->conexion->query($sql);

            $resultado = $empleado->buscarEmpleados($_POST['campo'], $_POST['dato']);

            //Si se encuentran resultados, se crean tantas filas en la tabla HTML
            //como filas en la tabla de la base de datos hayan coincidido con la búsqueda
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
        }

        //Cerrar conexión
        $empleado->cerrarConexion();

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

                        buscar();

                    ?>
                </table>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>