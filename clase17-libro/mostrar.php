<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>dashboard Libro</title>
</head>
<body>

<?php

 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "datalibro";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Conesion FALLIDA: " . $conn->connect_error);
 }

 $id=$_GET['id'];

 $sql = "SELECT * FROM libros WHERE id= $id";
 $result = $conn->query($sql);

  
if ($result->num_rows > 0) {
  // output data of each row
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo <<<HTML
        <li>
        <img src="{$row['portada_libro']}" alt="{$row['nombre_libro']}">   
        <h2>{$row["nombre_libro"]}</h2>
        <h3>{$row["autor_libro"]}</h3>
        <p>sinopsis: {$row["sinopsis_libro"]}</p>
        <p>Año: {$row["ano_libro"]}<p>
        <p>Genero: {$row["genero_libro"]}<p>
    HTML;
    if ($row["fav_libro"]){ echo "<p>FAVORITOS: SI</p>";}
    else{echo"<p>FAVORITOS: SI</p>";}
    echo "</li>";
  }

  echo "</ul>";
} 

else {
  echo "0 results";
}

$conn->close();
?>

<button><a href="index.php">VOLVER a INICIO</a></button>

</body>
</html>