<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia = $_POST['materia'];

    $sql = "INSERT INTO materias (idMateria, idProfesor, nombreMateria, profesorCargo) VALUES (
        '{$materia['idMateria']}', '{$materia['idProfesor']}', '{$materia['nombreMateria']}', '{$materia['profesorCargo']}'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Materia agregada exitosamente";
    } else {
        echo "Error al agregar materia: " . $conn->error;
    }
}

$conn->close();
?>
