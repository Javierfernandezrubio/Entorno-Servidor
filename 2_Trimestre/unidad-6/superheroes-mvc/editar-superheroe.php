<?php
/**
 * Editar Superheroe
 * 
 * 
 * @author Javier Fernandez Rubio
 */
include("include/constantes.php");
include("superheroe.php");

function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}

$sh = Superheroe::getInstancia();

$id = $_GET["id"];
$nombre = "";
$velocidad = "";

$datos = $sh->get($id);
foreach ($datos as $elemento) {
    # code...
    foreach ($elemento as $key => $valor) {
        # code...
        //echo "$key: $valor<br>";
        if ($key == "Nombre") {
            $nombre = $valor;
        }
        if ($key == "velocidad") {
            $velocidad = $valor;
        }
    }
}

$cad = "";
echo " " . $sh->getMensaje() . "<br>";


if (isset($_GET["editar"])) {
    $cad = "";
    $nom = clearData($_GET["nombre"]);
    $veloc = clearData($_GET["velocidad"]);
    $datos = array("nombre" => $nom, "velocidad" => $veloc);
    $sh->edit($datos);
    $cad .= $sh->getMensaje() . "<br>";
    $datos = $sh->get($id);
    foreach ($datos as $key) {
        foreach ($key as $value => $v) {
            $cad .= "$value-$v<br>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Fernández Rubio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Fernández Rubio</title>


    <noscript>
        <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
            Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
    </noscript>


</head>

<body>
    <h1>Editar superheroe</h1>
    <form action="edit.php" method="get">
        <div>
            <?php
            echo "<h2>Antiguos datos:</h2>
            ID: $id<br>
            Nombre: $nombre<br>
            Velocidad: $velocidad<br><br>";

            echo "<h2>Nuevos datos:</h2>
            <input type='text' value='$nombre' name='nombre' placeholder='Nuevo nombre'><br><br>
            <input type='text' value='' name='velocidad' placeholder='Nueva velocidad'><br><br>
            <button name='editar'>EDITAR</button><br>
            <br><br>";

            echo "<a href='buscar.php'>Volver</a> ";
            ?>
        </div>

    </form>
</body>

</html>