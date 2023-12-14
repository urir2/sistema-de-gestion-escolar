<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno = $_POST['alumno'];

    $sql = "INSERT INTO alumnos (apellido,nombre,documento, direccion, telefono, dia, mes, anio, materiaPrevia, notas) VALUES (
        '{$alumno['apellido']}',
        '{$alumno['nombre']}',
        '{$alumno['documento']}', 
        '{$alumno['direccion']}', 
        '{$alumno['telefono']}',
        '{$alumno['dia']}', 
        '{$alumno['mes']}', 
        '{$alumno['anio']}',
        '{$alumno['materiaPrevia']}', 
        '{$alumno['notas']}'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno agregado exitosamente";
    } else {
        echo "Error al agregar alumno: " . $conn->error;
    }
}

$conn->close();
?>
