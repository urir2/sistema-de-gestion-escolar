<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idMateriaBuscar'])) {
    
    $conexion = new mysqli("localhost", "root", "", "gestion_escolar");

    
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    
    $idMateria = $conexion->real_escape_string($_POST['idMateriaBuscar']);

    
    $query = "SELECT * FROM materias WHERE idMateria = '{$idMateria}'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $materia = $result->fetch_assoc();
        echo "<h3>Información de la materia:</h3>";
        echo "<p>ID de Materia: {$materia['idMateria']}</p>";
        echo "<p>ID de Profesor: {$materia['idProfesor']}</p>";
        echo "<p>Nombre de Materia: {$materia['nombreMateria']}</p>";
        echo "<p>Profesor a Cargo: {$materia['profesorCargo']}</p>";
    } else {
        echo "<p>Materia no encontrada</p>";
    }

    
    $conexion->close();
} else {
    echo "Acceso no autorizado";
}
?>
