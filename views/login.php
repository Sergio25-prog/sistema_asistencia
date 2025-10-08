<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso de Empleados</title>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="index.php?controller=acceso&action=procesarLogin" method="POST">
            <label for="numero_identificacion">Número de Identificación:</label>
            <input type="text" name="numero_identificacion" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Acceder</button>
        </form>
    </div>
</body>
</html>