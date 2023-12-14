<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['documento'])) {
    
    $conexion = new mysqli("localhost", "root", "", "gestion_escolar");

    
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    
    $documento = $conexion->real_escape_string($_POST['documento']);

    
    $query = "SELECT * FROM alumnos WHERE documento = '{$documento}'";
    $result = $conexion->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $alumno = $result->fetch_assoc();
            echo "<h3>Información del alumno:</h3>";
            echo "<p>Apellido: " . $alumno['apellido'] . "</p>";
            echo "<p>Nombre: " . $alumno['nombre'] . "</p>";
            echo "<p>Dirección: " . $alumno['direccion'] . "</p>";
            echo "<p>Teléfono: " . $alumno['telefono'] . "</p>";
            echo "<p>Fecha de Nacimiento: " . $alumno['dia'] . "/" . $alumno['mes'] . "/" . $alumno['anio'] . "</p>";
            echo "<p>Materia Previa: " . $alumno['materiaPrevia'] . "</p>";
            echo "<p>Notas: " . $alumno['notas'] . "</p>";
        } else {
            echo "<p>Alumno no encontrado</p>";
        }
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    
    $conexion->close();
} else {
    echo "Acceso no autorizado";
}
?>
