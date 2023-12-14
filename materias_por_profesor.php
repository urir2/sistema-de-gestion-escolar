<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idProfesorBuscar'])) {
    
    $conexion = new mysqli("localhost", "root", "", "gestion_escolar");

    
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }


    $idProfesor = $_POST['idProfesorBuscar'];


    $query = "SELECT * FROM materias WHERE idProfesor = '{$idProfesor}'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<h3>Materias encontradas para el profesor:</h3>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['nombreMateria']} - {$row['profesorCargo']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay materias asignadas para el profesor con ID: {$idProfesor}</p>";
    }

    // Cerrar conexión
    $conexion->close();
} else {
    echo "Acceso no autorizado";
}
?>
