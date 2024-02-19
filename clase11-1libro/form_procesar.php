<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Formulario</title>
</head>
<body>

<?php

$nombre = $_GET['nombre_libro'];
$autor = $_GET['autor_libro'];
$sinopsis = $_GET['sinopsis_libro'];
$portada = $_GET['portada_libro'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "libro";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO `libro` (`nombre_libro`, `autor_libro`, `sinopsis_libro`, `portada_libro`)
VALUES ('".$nombre."', '".$autor."', '".$sinopsis."', '".$portada."');";

if ($conn->query($sql) === TRUE) {
  echo '<p>LIBRO INSERTADO</p>';
  echo '<a href="index.php">VUELVE A INICIO</a>';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>

</body>
</html>

