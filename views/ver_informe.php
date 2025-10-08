<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Asistencia</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 50px auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Informe General de Asistencia</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre Empleado</th>
                    <th>Tipo de Registro</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Se itera sobre los resultados obtenidos del modelo
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    // Extraer variables para facilitar su uso
                    extract($fila);
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($nombre) . ' ' . htmlspecialchars($apellido) . '</td>';
                    echo '<td>' . htmlspecialchars(ucfirst($tipo)) . '</td>'; // ucfirst para poner la primera letra en mayúscula
                    echo '<td>' . htmlspecialchars($fecha_hora) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Volver al registro</a>
    </div>
</body>
</html> 