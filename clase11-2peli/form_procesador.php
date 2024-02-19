<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Formulario</title>
</head>
<body>

<?php

$nombre = $_POST['nombre_peli'];
$director = $_POST['director_peli'];
$sinopsis = $_POST['sinopsis_peli'];
$portada = $_POST['portada_peli'];
$genero = $_POST['genero_peli'];
$ano = $_POST['ano_peli'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "videoteca";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Conesion FALLIDA: " . $conn->connect_error);
}

//comando para hacer si que si en la sinopsis hay comillas el programa no de problemas
$sinopsis = $conn->real_escape_string($sinopsis);

$sql = "INSERT INTO `peliculas` (`nombre_peli`, `director_peli`, `sinopsis_peli`, `portada_peli`, `genero_peli`, `ano_peli`)
VALUES ('".$nombre."', '".$director."', '".$sinopsis."', '".$portada."', '".$genero."', '".$ano."');";

if ($conn->query($sql) === TRUE) {
  echo '<p>PELICULA INSERTADA</p>';
  echo '<a href="index.php">VUELVE A INICIO</a>';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>

</body>
</html>

