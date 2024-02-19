<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de LIBROS</title>
</head>
<body>
    <h2>Ingresa la información del libro:</h2>
    <form action="form_procesar.php" method="get">
        <label for="nombre">Titulo:</label>
        <input type="text" id="nombre" name="nombre_libro" required><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor_libro" required><br>

        <label for="portada">Foto de Portada (URL):</label>
        <input type="text" id="portada" name="portada_libro" required><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sinopsis" name="sinopsis_libro" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>