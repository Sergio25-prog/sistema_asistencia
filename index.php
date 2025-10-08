<?php
// index.php - El único punto de entrada ⚙️

// 1. Decidimos qué controlador usar.
// Si la URL tiene ?controller=acceso, usamos AccesoController.
// Si no, por defecto usamos AsistenciaController.
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'AsistenciaController';
$controllerFile = 'controllers/' . $controllerName . '.php';

// 2. Verificamos que el archivo del controlador exista y lo cargamos.
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // 3. Decidimos qué acción (método) ejecutar de ese controlador.
    // Si no se especifica, la acción por defecto será 'mostrarFormulario' o 'mostrarLogin'.
    if ($controllerName === 'AsistenciaController') {
        $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarFormulario';
    } else { // Para AccesoController
        $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarLogin';
    }

    // 4. Creamos una instancia del controlador y llamamos a la acción.
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Error: La acción '$action' no existe.";
    }

} else {
    echo "Error: El controlador '$controllerName' no existe.";
}
?>