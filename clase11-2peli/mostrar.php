<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>database PELICULAS</title>
</head>
<body>

<?php

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

 $id=$_GET['id'];

 $sql = "SELECT * FROM peliculas WHERE id= $id';'";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>" . $row["id"] ."<h2>" .$row["nombre_peli"]."</h2>"."<h3>" . $row["director_peli"]."</h2>" ."<p>" . $row["portada_peli"]. "</p>"."<p>" . $row["sinopsis_peli"]."</p>"."<p>" . $row["genero_peli"]."</p>"."<p>" . $row["ano_peli"]."</p>"."<button>ELIMINAR</button>"."<button>MODIFICAR</button>"."</li>";
  }
  echo "</ul>";
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>