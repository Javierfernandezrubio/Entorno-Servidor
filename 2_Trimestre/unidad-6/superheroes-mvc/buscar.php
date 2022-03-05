<?php

session_start();

include "include/constantes.php";
include "superheroe.php";

function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}

foreach ($_SESSION["logeo"] as $key => $valor) {
    $nombreUser = $valor["nombre"];
    //$contrasenaUser = $valor["contrasena"];
    $perfilUser = $valor["perfil"];
}

$sh = Superheroe::getInstancia();

$id = 0;

$cad = "";
echo " " . $sh->getMensaje() . "<br>";

if (isset($_GET["buscarTodos"])) {
    $cad = "";

    $datos = $sh->getAll();
    foreach ($datos as $key) {

        foreach ($key as $value => $v) {
            if ($value == "id") {
                $id = $v;
            }
            if ($value != "pass") {
                $cad .= "$value - $v<br>";
            }
        }

        if (!$perfilUser == "admin") {
            $cad;
        } else {
            $cad .= "&nbsp;<form method='get'>
        <input type='submit'  name='editar' value='Editar Superheroe'>
        <input type='hidden'  name='id' value='$id'>
        <input type='submit' name='eliminar' value='Eliminar Superheroe'>
        </form><br><br>";
        }
    }
}

if (isset($_GET["buscarNombre"])) {
    $cad = "";
    $nom = clearData($_GET["Nombre"]);
    // $id = $_GET["id"];
    $datos = $sh->getNombre($nom);
    foreach ($datos as $key) {
        foreach ($key as $value => $v) {
            $cad .= "$value-$v<br>";
            # code...
        }
        # code...
    }
}

if (isset($_GET["registrar"])) {
    header("Location: registrar-superheroe.php");
}

if (isset($_GET["editar"])) {
    $id = $_GET["id"];
    header("Location: editar-superheroe.php?id=$id");
}

if (isset($_GET["eliminar"])) {
    $cad = "";

    $sh->delete($_GET["id"]);

    $datos = $sh->getAll();
    /*    foreach ($datos as $key) {
foreach ($key as $value => $v) {
$cad .= "$value-$v<br>";
}
} */
}

?>
<!-- @author Javier Fernández Rubio -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Fernández Rubio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Fernández Rubio</title>
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <noscript>
        <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
            Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
    </noscript>


</head>

<body>
    <h1>Javier Fernández Rubio</h1>
    <form action="index.php" method="get">
        <label for="fname">Nombre:</label>
        <input type="text" placeholder="Nombre" id="fname" name="Nombre" onkeyup="showHint(this.value)">
        <p>Sugerencias: <span id="txtHint"></span></p>
        <input type='submit' name='buscarNombre' value='Buscar Nombre'>
        <input type='submit' name='buscarTodos' value='Listar Superheroes'>
        <?php
if ($perfilUser == "admin") {
    echo "<input type='submit' name='registrar' value='Registrar Superheroe'>";
}
?>
        <br><br>

        <br>
        <br>
        <h2>SUPERHEROES</h2>
        <div>
            <?php
echo $cad;
?>
        </div>

    </form>
</body>

</html>