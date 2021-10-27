<?php

    //IMPORTACIONES
    require_once 'gestionbd.php';

    class Empleado extends GestionBD{

        //ATRIBUTOS
        private $bd = null;

        function __construct(){

            $this->bd = new GestionBD();

        }

        function altaEmpleado($dni, $nombre, $correo, $telefono){
            
            //$bd = new GestionBD();

            //Validar si correo viene vacío
            if($correo != '')
                $correo = '\''.$correo.'\'';
            else
                $correo = 'NULL';
            
            //Consulta SQL para añadir una fila nueva a la tabla empleado
            $sql =  "INSERT INTO empleado(dni, nombre, correo, telefono) ".
                "VALUES('".$dni."', '".$nombre."', ".$correo.", '".$telefono."');";

            //Mandar la consulta a la Clase GestionBD
            return $resultado = $this->bd->consultar($sql);

            //Cerrar conexión
            //$this->bd->cerrarConexion();

        }

        function borrarEmpleado($id){

            //Consulta SQL para borrar una fila de la tabla empleado
            $sql = 'DELETE FROM empleado WHERE idEmpleado = '.$id.';';
            
            //Mandar la consulta a la Base de Datos
            return $this->bd->consultar($sql);

        }

        function buscarEmpleado($campo, $dato){

            //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
            $sql = 'SELECT * FROM empleado WHERE '.$campo.' LIKE "%'.$dato.'%";';

            //Cerrar conexión
            //$this->bd->cerrarConexion();
                 
            //Mandar la consulta a la Clase GestionBD
            return $this->bd->consultar($sql);

        }

        function mostrarEmpleados(){

            //Consulta SQL para devolver todas las filas de la tabla empleado
            $sql = 'SELECT * FROM empleado;';

            //Mandar la consulta a la Base de Datos
            return $this->bd->consultar($sql);

        }

        function mostrarEmpleado($id){
            
            //Consulta SQL para devolver una fila de la tabla empleado
            $sql = 'SELECT * FROM empleado WHERE idEmpleado = '.$id.';';

            //Mandar la consulta a la Base de Datos
            return $this->bd->consultar($sql);

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

            //Mandar la consulta a la Base de Datos
            return $resultado = $this->bd->consultar($sql);

        }

    }

?>