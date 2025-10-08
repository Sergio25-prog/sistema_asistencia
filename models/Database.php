<?php
// MODELO: Lógica de datos.
// Esta clase se encarga exclusivamente de la conexión con la base de datos.

class Database {
    private $host = 'localhost';
    private $db_name = 'empresa_xyz';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Método para conectar a la BD
    public function connect() {
        $this->conn = null;
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            // Configurar PDO para que lance excepciones en caso de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Error de Conexión: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
?>