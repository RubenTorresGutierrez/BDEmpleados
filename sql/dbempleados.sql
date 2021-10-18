-- TABLAS
-- TABLA empleado
CREATE TABLE empleado(
    idEmpleado tinyint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dni char(9) NOT NULL UNIQUE,
    nombre varchar(30) NOT NULL,
    correo varchar(100) NULL,
    telefono char(9) NOT NULL
);