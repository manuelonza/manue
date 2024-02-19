<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>LIBROS</title>
</head>
<body>

<?php

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
 
 $sql = "SELECT nombre_libro, autor_libro, sinopsis_libro, portada_libro FROM libro";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>" ."<h2>" .$row["nombre_libro"]."</h2>"."<h3>" . $row["autor_libro"]."</h2>" ."<p>" . $row["portada_libro"]. "</p>"."<p>" . $row["sinopsis_libro"]."</p>"."</li>";
  }
  echo "</ul>";
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>

