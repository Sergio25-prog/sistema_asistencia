<?php
// CONTROLADOR: Gestiona la lógica de inicio y cierre de sesión.
require_once 'models/Database.php';
require_once 'models/Usuario.php';

class AccesoController {

    // Muestra la vista del formulario de login
    public function mostrarLogin() {
        require_once 'views/login.php';
    }

    // Procesa los datos del formulario de login
    public function procesarLogin() {
        session_start(); // Es fundamental iniciar la sesión

        $database = new Database();
        $db = $database->connect();
        $usuario = new Usuario($db);

        $usuario->numero_identificacion = $_POST['numero_identificacion'];
        $usuario->password = $_POST['password'];

        // Si el login es exitoso (según el modelo)
        if ($usuario->login()) {
            // Guardamos el ID del usuario en una variable de sesión
            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['logueado'] = true;
            
            // Redirigimos al panel principal o al informe
            header('Location: index.php?action=informe');
        } else {
            // Si falla, mostramos un error y volvemos al login
            echo "Error: Número de identificación o contraseña incorrectos.";
            header('Refresh:2; url=index.php?controller=acceso&action=mostrarLogin');
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy(); // Destruimos la sesión
        header('Location: index.php'); // Redirigimos al inicio
    }
}
?>