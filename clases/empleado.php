<?php

    //IMPORTACIONES
    require_once 'operacionesbd.php';

    class Empleado{

        //ATRIBUTOS
        private $bd = null;

        function __construct(){

            $this->bd = new OperacionesBD();

        }

        function altaEmpleado($dni, $nombre, $correo, $telefono){

            //Validar si correo viene vacío
            if($correo != '')
                $correo = '\''.$correo.'\'';
            else
                $correo = 'NULL';
            
            //Consulta SQL para añadir una fila nueva a la tabla empleado
            $sql =  "INSERT INTO empleado(dni, nombre, correo, telefono) ".
                "VALUES('".$dni."', '".$nombre."', ".$correo.", '".$telefono."');";

            //Mandar la consulta a la Clase OperacionesBD
            $resultado = $this->bd->consultar($sql);

            //Se asigna el número de error para después enviarlo por url
            $errno = $this->bd->codigoError();

            //Cerrar conexión
            $this->bd->cerrarConexion();

            //Enviar a página de correcto o error, depende el resultado
            if($resultado)
                header('location:resultado.php?result=ok');
            else header('location:resultado.php?result=err&errno='.$errno);

        }

        function borrarEmpleado($id){

            //Consulta SQL para borrar una fila de la tabla empleado
            $sql = 'DELETE FROM empleado WHERE idEmpleado = '.$id.';';
            
            //Mandar la consulta a la Clase OperacionesBD
            $resultado = $this->bd->consultar($sql);

            //Se asigna el número de error para después enviarlo por url
            $errno = $this->bd->codigoError();

            //Cerrar conexión
            $this->bd->cerrarConexion();

            //Enviar a página de correcto o error, depende el resultado
            if($resultado)
                header('location:resultado.php?result=ok');
            else header('location:resultado.php?result=err&errno='.$errno);

        }

        // function buscarEmpleado($campo, $dato){

        //     //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
        //     if($campo != 'nombre')
        //         $sql = 'SELECT * FROM empleado WHERE '.$campo.' = "'.$dato.'";';
        //     else $sql = 'SELECT * FROM empleado WHERE '.$campo.' LIKE "%'.$dato.'%";';

        //     //Mandar la consulta a la Clase OperacionesBD
        //     $this->bd->consultar($sql);
            
        //     //Si se encuentran resultados, se crean tantas filas en la tabla HTML
        //     //como filas en la tabla de la base de datos hayan coincidido con la búsqueda
        //     echo '<table>'.
        //             '<tr>'.
        //                 '<th>DNI</th>'.
        //                 '<th>Nombre</th>'.
        //                 '<th>Correo</th>'.
        //                 '<th>Teléfono</th>'.
        //                 '<th>Modificar</th>'.
        //                 '<th>Borrar</th>'.
        //             '</tr>';
        //     if ($this->bd->numeroFilas() > 0) {
        //         while ($fila = $this->bd->extraerFila()) {
        //             echo '<tr>'.
        //                     '<td>' . $fila['dni'] . '</td>'.
        //                     '<td>' . $fila['nombre'] . '</td>'.
        //                     '<td>' . $fila['correo'] . '</td>'.
        //                     '<td>' . $fila['telefono'] . '</td>'.
        //                     '<td><a href="decision.php?op=m&id='.$fila['idEmpleado'].'"><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
        //                     '<td><a href="decision.php?op=b&id='.$fila['idEmpleado'].'"><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
        //                 '</tr>';
        //         }
        //     }else{
        //         echo '<tr>'.
        //                 '<td colspan="6">'.
        //                 '<h1>No se han encontrado empleados con '. $campo .': "'. $dato .'"</h1>'.
        //                 '</td>'.
        //             '</tr>';
        //     }
        //     echo '</table>';

        //     //Cerrar conexión
        //     $this->bd->cerrarConexion();

        // }

        function buscarDni($dato){

            //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
            $sql = 'SELECT * FROM empleado WHERE dni = "'.$dato.'";';

            //Mandar la consulta a la Clase OperacionesBD
            $this->bd->consultar($sql);
            
            //Si se encuentran resultados, se crean tantas filas en la tabla HTML
            //como filas en la tabla de la base de datos hayan coincidido con la búsqueda
            echo '<table>'.
                    '<tr>'.
                        '<th>DNI</th>'.
                        '<th>Nombre</th>'.
                        '<th>Correo</th>'.
                        '<th>Teléfono</th>'.
                        '<th>Modificar</th>'.
                        '<th>Borrar</th>'.
                    '</tr>';
            if ($fila = $this->bd->extraerFila()) {
                echo '<tr>'.
                        '<td>' . $fila['dni'] . '</td>'.
                        '<td>' . $fila['nombre'] . '</td>'.
                        '<td>' . $fila['correo'] . '</td>'.
                        '<td>' . $fila['telefono'] . '</td>'.
                        '<td><a href="decision.php?op=m&id='.$fila['idEmpleado'].'"><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
                        '<td><a href="decision.php?op=b&id='.$fila['idEmpleado'].'"><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
                    '</tr>';
            }else{
                echo '<tr>'.
                        '<td colspan="6">'.
                        '<h1>No se han encontrado empleados con dni: "'. $dato .'"</h1>'.
                        '</td>'.
                    '</tr>';
            }
            echo '</table>';

            //Cerrar conexión
            $this->bd->cerrarConexion();

        }

        function buscarNombre($dato){

            //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
            $sql = 'SELECT * FROM empleado WHERE nombre LIKE "%'.$dato.'%";';

            //Mandar la consulta a la Clase OperacionesBD
            $this->bd->consultar($sql);
            
            //Si se encuentran resultados, se crean tantas filas en la tabla HTML
            //como filas en la tabla de la base de datos hayan coincidido con la búsqueda
            echo '<table>'.
                    '<tr>'.
                        '<th>DNI</th>'.
                        '<th>Nombre</th>'.
                        '<th>Correo</th>'.
                        '<th>Teléfono</th>'.
                        '<th>Modificar</th>'.
                        '<th>Borrar</th>'.
                    '</tr>';
            if ($this->bd->numeroFilas() > 0) {
                while ($fila = $this->bd->extraerFila()) {
                    echo '<tr>'.
                            '<td>' . $fila['dni'] . '</td>'.
                            '<td>' . $fila['nombre'] . '</td>'.
                            '<td>' . $fila['correo'] . '</td>'.
                            '<td>' . $fila['telefono'] . '</td>'.
                            '<td><a href="decision.php?op=m&id='.$fila['idEmpleado'].'"><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
                            '<td><a href="decision.php?op=b&id='.$fila['idEmpleado'].'"><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
                        '</tr>';
                }
            }else{
                echo '<tr>'.
                        '<td colspan="6">'.
                        '<h1>No se han encontrado empleados con nombre: "'. $dato .'"</h1>'.
                        '</td>'.
                    '</tr>';
            }
            echo '</table>';

            //Cerrar conexión
            $this->bd->cerrarConexion();

        }

        function mostrarEmpleados(){

            //Consulta SQL para devolver todas las filas de la tabla empleado
            $sql = 'SELECT * FROM empleado;';

            //Mandar la consulta a la Clase OperacionesBD
            $this->bd->consultar($sql);

            if ($this->bd->numeroFilas() > 0) {
                while ($fila = $this->bd->extraerFila()) {
                    echo '<tr>'.
                            '<td>' . $fila['dni'] . '</td>'.
                            '<td>' . $fila['nombre'] . '</td>'.
                            '<td>' . $fila['correo'] . '</td>'.
                            '<td>' . $fila['telefono'] . '</td>'.
                            '<td><a href="decision.php?op=m&id='.$fila['idEmpleado'].'"><img src="img/icons/modificar.png" alt="Modificar Empleado" class="iconos" /></a></td>'.
                            '<td><a href="decision.php?op=b&id='.$fila['idEmpleado'].'"><img src="img/icons/borrar.png" alt="Borrar Empleado" class="iconos" /></a></td>'.
                        '</tr>';
                }
            }else{
                echo '<tr>'.
                        '<td colspan="6">'.
                            '<h1>No hay empleados</h1>'.
                        '</td>'.
                    '</tr>';
            }

            //Cerrar conexión
            $this->bd->cerrarConexion();

        }

        function mostrarEmpleado($id){
            
            //Consulta SQL para devolver una fila de la tabla empleado
            $sql = 'SELECT * FROM empleado WHERE idEmpleado = '.$id.';';

            //Mandar la consulta a la Clase OperacionesBD
            $resultado = $this->bd->consultar($sql);

            //Cerrar conexión
            $this->bd->cerrarConexion();

            return $resultado->fetch_array();

        }

        function modificarEmpleado($id, $dni, $nombre, $correo, $telefono){

            //Validar si correo viene vacío
            if($correo != '')
                $correo = '"'.$correo.'"';
            else
                $correo = 'NULL';
            
            //Consulta SQL para modificar una fila de la tabla empleado
            $sql = "UPDATE empleado SET dni = '".$dni."', nombre = '".$nombre."', ".
            "correo = ".$correo.", telefono = '".$telefono."' WHERE idEmpleado = ".$id.";";

            //Mandar la consulta a la Clase OperacionesBD
            $resultado = $this->bd->consultar($sql);

            //Se asigna el número de error para después enviarlo por url
            $errno = $this->bd->codigoError();

            //Cerrar conexión
            $this->bd->cerrarConexion();

            //Enviar a página de correcto o error, depende el resultado
            if($resultado)
                header('location:resultado.php?result=ok');
            else header('location:resultado.php?result=err&errno='.$errno);

        }

    }

?>