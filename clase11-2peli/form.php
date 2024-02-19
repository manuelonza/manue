<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de PELICULAS</title>
</head>
<body>
    <h2>Ingresa la información de la PELICULA:</h2>
    <form action="form_procesador.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Titulo:</label>
        <input type="text" id="nombre" name="nombre_peli" required><br>

        <label for="director">Director:</label>
        <input type="text" id="director" name="director_peli" required><br>

        <label for="portada">Foto de Portada pelicula (URL):</label>
        <input type="text" id="portada" name="portada_peli" required><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sinopsis" name="sinopsis_peli" rows="4" cols="50" required></textarea><br>

        <label for="genero">Genero:</label>
        <input type="text" id="genero" name="genero_peli" ><br>

        <label for="ano">Año:</label>
        <input type="number" id="ano" name="ano_peli"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>