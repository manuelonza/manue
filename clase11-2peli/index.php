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
 
 $sql = "SELECT id, nombre_peli, director_peli, portada_peli, sinopsis_peli, genero_peli, ano_peli FROM peliculas";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>" . "<h2>" . $row["nombre_peli"] . "</h2>" . "<h3>" . $row["director_peli"] . "</h3>" . "<p>" . $row["portada_peli"] . "</p>" . "<p>" . $row["sinopsis_peli"] . "</p>" . "<p>" . $row["genero_peli"] . "</p>" . "<p>" . $row["ano_peli"] . "</p>" . '<a href="https://' . $_SERVER['HTTP_HOST'] . '/clase11-2peli/mostrar.php?id=' . $row["id"] .'"><button>VER</button></a>' . "</li>";
  }
  echo "</ul>";
} else {
  echo "0 results";
}
$conn->close();
?>

</body>

</html>