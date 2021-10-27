<?php

    //IMPORTACIONES
    require_once 'config/configdb.php';

    class GestionBD{

        //ATRIBUTOS
        private $conexion = null;

        function __construct(){

            //OBJETOS
            // Se instancia un objeto desde la clase mysqli con los datos 
            // de conexión importados en forma de constantes desde configdb.php
            $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWD, DATABASE);

        }

        function consultar($sql){

            return $this->conexion->query($sql);

        }

        function cerrarConexion(){

            $this->conexion->close();

        }
    }

?>