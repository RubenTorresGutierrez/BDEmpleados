-- DATABASE
-- DROP DATABASE
DROP DATABASE IF EXISTS bdempleados;
-- CREATE DATABASE
CREATE DATABASE bdempleados DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
-- SELECT THE CORRECT DB
USE bdempleados;

-- TABLES
-- TABLE empleado
CREATE TABLE empleado(
    idEmpleado tinyint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dni char(9) NOT NULL UNIQUE,
    nombre varchar(30) NOT NULL,
    correo varchar(100) NULL,
    telefono char(9) NOT NULL
);