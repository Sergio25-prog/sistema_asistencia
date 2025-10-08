-- Tabla para almacenar la información de los empleados
CREATE TABLE empleados (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    numero_identificacion VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para almacenar los registros de entrada y salida
CREATE TABLE asistencia (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    empleado_id INT(11) UNSIGNED NOT NULL, -- Corresponde al 'id' de la tabla empleados
    tipo ENUM('entrada', 'salida') NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (empleado_id) REFERENCES empleados(id) ON DELETE CASCADE -- Si se borra un empleado, se borran sus registros.
);

-- Modificar la tabla empleados para agregar la contraseña
ALTER TABLE `empleados` ADD `password` VARCHAR(255) NOT NULL AFTER `apellido`;