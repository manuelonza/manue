<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>dashboard Libro</title>
</head>

<body>

    <h1>La Coleccion de LIBROS</h1>
    <ul>
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

        $sql = "SELECT * FROM libros";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo <<<HTML
    <li>
    <img src="{$row['portada_libro']}" alt="{$row['nombre_libro']}">
    <h2>{$row["nombre_libro"]}</h2>
    <h3>{$row["autor_libro"]}</h3>
   
    <a href="mostrar.php?id={$row['id']}">VER</a>
    <br>
 HTML;

                if ($row["fav_libro"] == 0)
                    echo <<<HTML
      <form action="anadir.php" method="get">
        <input type="hidden" name="libro_id" value="{$row['id']}">
        <button type="submit" name="add_favorite">Añadir a favoritos</button>
      </form>
      <br>
 HTML;

                if ($row["fav_libro"] == 1)
                    echo <<<HTML
      <form action="quitar.php" method="get">
        <input type="hidden" name="libro_id" value="{$row['id']}">
        <button type="submit" name="remove_favorite">Borrar de favoritos</button>
      </form>
    </li>
    HTML;
            }
        } else {
            echo "0 results";
        }


        ?>
    </ul>



    <!-- ul de favoritos -->
    <h2>Los LIBROS FAVORITOS</h2>

    <div class="favoritos">

        <ul>
            <?php

            $sql = "SELECT * FROM libros WHERE fav_libro = 1 ORDER BY fav_libro ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo <<<HTML
    <li>
    <img src="{$row['portada_libro']}" alt="{$row['nombre_libro']}">
    <h2>{$row["nombre_libro"]}</h2>
HTML;

                    if ($row["fav_libro"] == 1) {
                        echo <<<HTML
      <form action="quitar.php" method="get">
        <input type="hidden" name="libro_id" value="{$row['id']}">
        <button type="submit" name="remove_favorite">Borrar de favoritos</button>
      </form>
    </li>
HTML;
                    }
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </ul>

    </div>

</body>

</html>