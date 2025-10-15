<?php
// MODELO: Lógica de datos.
// Gestiona las operaciones CRUD para los registros de asistencia.

class Registro {
    private $conn;
    private $table = 'asistencia';

    // Propiedades del registro
    public $id;
    public $empleado_id;
    public $tipo; // 'entrada' o 'salida'
    public $fecha_hora;

    // Constructor que recibe la conexión a la BD
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un nuevo registro de asistencia
    public function crear() {
        $query = 'INSERT INTO ' . $this->table . ' (empleado_id, tipo) VALUES (:empleado_id, :tipo)';
        
        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->empleado_id = htmlspecialchars(strip_tags($this->empleado_id));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        
        // Vincular parámetros
        $stmt->bindParam(':empleado_id', $this->empleado_id);
        $stmt->bindParam(':tipo', $this->tipo);

        // Ejecutar
        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
    
    // Método para leer todos los registros para un informe
    public function leerInforme() {
        // Se une con la tabla de empleados para obtener el nombre y apellido.
        $query = 'SELECT e.nombre, e.apellido, a.tipo, a.fecha_hora 
                  FROM ' . $this->table . ' a
                  LEFT JOIN empleados e ON a.empleado_id = e.id
                  ORDER BY a.fecha_hora DESC';
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;// Retorna el objeto PDOStatement
        } catch (PDOException $e){
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
}
}