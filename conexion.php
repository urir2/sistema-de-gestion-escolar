<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_escolar";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
?>
