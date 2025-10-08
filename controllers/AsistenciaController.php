<?php
// CONTROLADOR: Lógica de la aplicación.
// Recibe las peticiones del usuario, interactúa con el Modelo y selecciona la Vista a mostrar.

require_once 'models/Database.php';
require_once 'models/Registro.php';

class AsistenciaController {
    
    // Muestra el formulario de registro de asistencia (la VISTA)
    public function mostrarFormulario() {
        require_once 'views/registrar_asistencia.php';
    }
    
    // Procesa el registro de asistencia
    public function registrar() {
        // 1. Conectar a la base de datos (usando el MODELO Database)
        $database = new Database();
        $db = $database->connect();
        
        // 2. Crear una instancia del MODELO Registro
        $registro = new Registro($db);
        
        // 3. Asignar los datos recibidos del formulario a las propiedades del modelo
        $registro->empleado_id = $_POST['empleado_id'];
        $registro->tipo = $_POST['tipo'];
        
        // 4. Llamar al método del modelo para guardar los datos
        if($registro->crear()) {
            echo "Asistencia registrada con éxito.";
        } else {
            echo "Error al registrar la asistencia.";
        }
        // Redirigir al formulario principal después de un momento
        header("Refresh:2; url=index.php");
    }
    
    // Muestra el informe de asistencia (la VISTA)
    public function verInforme() {
        $database = new Database();
        $db = $database->connect();
        
        $registro = new Registro($db);
        
        // 1. Obtener los datos del MODELO
        $resultado = $registro->leerInforme();
        
        // 2. Cargar la VISTA y pasarle los datos
        require_once 'views/ver_informe.php';
    }
}
?>