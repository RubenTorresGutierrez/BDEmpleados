<?php

    class Empleado{
        private $dni;
        private $nombre;
        private $correo;
        private $telefono;

        function __construct($dni, $nombre, $correo, $telefono){
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->telefono = $telefono;
        }
    }

?>