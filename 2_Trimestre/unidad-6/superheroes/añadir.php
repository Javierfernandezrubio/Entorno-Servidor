<?php

/**
 * Añadir un nuevo superhéroe
 * 
 * 
 * @author Javier Fernandez Rubio
 */

include "conexionBD.php";

$db = conectarBD();
$nombre = "";
$poder = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if (isset($_POST['poder'])) {
        $poder = $_POST['poder'];
    }
    $sql = "INSERT INTO superheroes (nombre, capacidades) VALUES (:nombre, :poder)";

    $consulta = $db->prepare($sql);
    //$consulta->bindParam(':nombre', $nombre);
    //$consulta->bindParam(':poder', $poder);
    //$consulta->execute(array(':nombre'=>$nombre, ':poder'=>$poder));

    if ($consulta->execute(array(':nombre' => $nombre, ':poder' => $poder))) {
        echo "Registro añadido correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}






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
        <input type="text" name="nombre" placeholder="Nombre Superhéroe">
        <input type="text" name="poder" placeholder="Poder">
        <input type="submit" value="Añadir">
    </form>

    <?php
    echo "<br><a href='index.php'>Volver</a>";
    ?>


</body>

</html>