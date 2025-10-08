<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Asistencia</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Asistencia</h2>
        <form action="index.php?action=registrar" method="POST">
            <label for="empleado_id">Número de Identificación:</label>
            <input type="text" name="empleado_id" required>
            
            <label for="tipo">Tipo de Registro:</label>
            <select name="tipo">
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
            </select>
            
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>