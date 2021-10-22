<?php

    //IMPORTACIONES
    require_once 'config/configdb.php';

    class Empleado{

        //ATRIBUTOS
        private $conexion;

        function __construct(){

            //OBJETOS
            // Se instancia un objeto desde la clase mysqli con los datos 
            // de conexión importados en forma de constantes desde configdb.php
            $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWD, DATABASE);

        }

        function anadirEmpleado($dni, $nombre, $correo=NULL, $telefono){

            //Consulta SQL para añadir una fila nueva a la tabla empleado
            if($correo == 'NULL')   
                $sql =  'INSERT INTO empleado(dni, nombre, correo, telefono)'.
                        "VALUES('".$dni."', '".$nombre."', NULL, '".$telefono."');";
            else                
                $sql =  'INSERT INTO empleado(dni, nombre, correo, telefono)'.
                    "VALUES('".$dni."', '".$nombre."', '".$correo."', '".$telefono."');";
            //Mandar la consulta a la Base de Datos
            $this->conexion->query($sql);

        }

        function mostrarEmpleado($id){
            
            //Consulta SQL para devolver una fila de la tabla empleado
            $sql = 'SELECT * FROM empleado WHERE idEmpleado = '.$id.';';
            //Mandar la consulta a la Base de Datos
            return $this->conexion->query($sql);

        }

        function mostrarEmpleados(){

            //Consulta SQL para devolver todas las filas de la tabla empleado
            $sql = 'SELECT * FROM empleado;';
            //Mandar la consulta a la Base de Datos
            return $this->conexion->query($sql);

        }

        function borrarEmpleado($id){

            //Consulta SQL para borrar una fila de la tabla empleado
            $sql = 'DELETE FROM empleado WHERE idEmpleado = '.$id.';';
            //Mandar la consulta a la Base de Datos
            $this->conexion->query($sql);

        }

        function modificarEmpleado($id, $dni, $nombre, $correo, $telefono){

            //Consulta SQL para modificar una fila de la tabla empleado
            $sql = 'UPDATE empleado SET dni = "'.$dni.'", nombre = "'.$nombre.'", correo = "'.$correo.'", telefono = "'.$telefono.'" WHERE idEmpleado = '.$id.';';
            //Mandar la consulta a la Base de Datos
            $this->conexion->query($sql);

        }

        function buscarEmpleados($campo, $dato){

            //Consulta SQL para devolver las filas que contengan un dato parecido en el campo seleccionado
            $sql = 'SELECT * FROM empleado WHERE '.$campo.' LIKE "%'.$dato.'%";';
            //Mandar la consulta a la Base de Datos
            return $this->conexion->query($sql);

        }

        function cerrarConexion(){
            $this->conexion->close();
        }
    }

?>