<?php

/**
 * Base de datos con php sobre superheroes
 * 
 * 
 * @author Javier Fernandez Rubio
 * 
 */
include "conexionBD.php";

$db = conectarBD();

// Secuencia read o select
//$selectAll = "SELECT * FROM superheroes";
//$consulta = $db->prepare("SELECT * FROM superheroes WHERE nombre LIKE '%a%'");
//$consulta->execute();
//$result = $db->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Fernandez Rubio">
    <title>Superhéroes</title>
</head>

<body>

    <h1>Superhéroes</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="busqueda" placeholder="Busqueda">
        <input type="submit" value="Buscar"> |
        <a href="añadir.php" rel="noopener noreferrer">Añadir SuperHéroe</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            $sql = "SELECT * FROM superheroes WHERE nombre LIKE CONCAT ('%',:busqueda,'%')";
            $consulta = $db->prepare($sql);
            $consulta->execute(array(':busqueda' => $busqueda));
            $result = $consulta->fetchAll();
        }
        foreach ($result as $row) {
            echo $row['nombre'] . " " . $row['capacidades'] . " | <a href='borrar.php?id=" . $row['id'] . "'>Borrar</a> | <a href='editar.php?id=" . $row['id'] . "'>Editar</a><br>";
        }
    }

    ?>


</body>

</html>