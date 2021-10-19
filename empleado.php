<?php

    //IMPORTACIONES
    require_once 'configdb.php';

    class Empleado{

        //OBJETOS
        // Se instancia un objeto desde la clase mysqli con los datos 
        // de conexión importados en forma de constantes desde configdb.php
        $mysqli = new mysqli(URL, USUARIO, PASSWD, DATABASE);

        //ATRIBUTOS
        private $dni;
        private $nombre;
        private $correo;
        private $telefono;

        function __construct($dni, $nombre, $correo = '', $telefono){
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
            $mysqli->query($sql);
        }
        function mostrarEmpleado(){

        }
    }

?>