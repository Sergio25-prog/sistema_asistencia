<?php
// MODELO: Gestiona los datos de los usuarios.
class Usuario {
    private $conn;
    private $table = 'empleados'; // Usaremos la misma tabla de empleados

    public $id;
    public $numero_identificacion;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar un empleado por su número de identificación y verificar la contraseña
    public function login() {
        $query = 'SELECT id, password FROM ' . $this->table . ' WHERE numero_identificacion = :numero_identificacion LIMIT 1';
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':numero_identificacion', $this->numero_identificacion);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Comparamos la contraseña enviada con el hash guardado en la BD
            if (password_verify($this->password, $row['password'])) {
                $this->id = $row['id'];
                return true;
            }
        }
        return false;
    }
}
?>