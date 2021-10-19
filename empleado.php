<?php

    //IMPORTACIONES
    require_once 'configdb.php';

    class Empleado{

        //ATRIBUTOS
        private $dni;
        private $nombre;
        private $correo;
        private $telefono;
        private $conexion;

        function __construct($dni, $nombre, $correo, $telefono){

            //OBJETOS
            // Se instancia un objeto desde la clase mysqli con los datos 
            // de conexión importados en forma de constantes desde configdb.php
            $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWD, DATABASE);

            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->anadirEmpleado();
        }
        function anadirEmpleado(){
            //Consulta SQL para añadir una fila nueva a la tabla empleado
            $sql =  'INSERT INTO empleado(dni, nombre, correo, telefono)'.
                    "VALUES('".$this->dni."', '".$this->nombre."', '".$this->correo."', '".$this->telefono."');"
            //Mandar la consulta a la Base de Datos
            $this->conexion->query($sql);
        }
        function mostrarEmpleado(){

        }
    }

?>