<?php

$favorito =$_GET['libro_id'];

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
 
 $sql = "UPDATE libros SET
 fav_libro = '1'
 WHERE id = '".$favorito."';";
 $result = $conn->query($sql);



// Redirigir al usuario a index.php
header('Location: index.php');

// Detener la ejecución de código posterior
exit();