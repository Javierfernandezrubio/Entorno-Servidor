<?php 
/**
 * Editar un registro de la tabla superheroes
 * 
 * @author Javier Fernandez Rubio
 * 
 */
include "conexionBD.php";

$db = conectarBD();
$id = $_GET['id'];

$nombre = "";
$poder = "";

/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    if (isset($_POST['poder'])) {
        $poder = $_POST['poder'];
    }
} */

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

    <h2>Editando superhéroe</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="nombre" placeholder="Nuevo nombre">
        <input type="text" name="poder" placeholder="Nuevo poder">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Editar">
    </form>

    <?php
    if (isset($_POST['nombre']) && isset($_POST['poder'])) {
        $sql = "UPDATE superheroes SET nombre = :nombre , capacidades = :poder WHERE id = :id";
        $consulta = $db->prepare($sql);
        
        if ($consulta->execute(array(':nombre' => $_POST['nombre'], ':poder' => $_POST['poder'], ':id' => $_POST['id']))) {
            echo "Registro editado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    echo "<br><a href='index.php'>Volver</a>";
    ?>


</body>

</html>