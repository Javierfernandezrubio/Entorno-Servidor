<?php
// Obtener imagenes de una carpeta

session_start();

// Array de imagenes
$arrayImagenes = glob('imagenes/*.*');

//if (isset($_POST['usuario']) && isset($_POST['password'])) {
//$usuario = $_POST['usuario'];
//$password = $_POST['password'];
//
//if ($usuario == 'usuario' && $password == '1234') {
//$_SESSION['usuario'] = $usuario;
//header('Location: index.php');
//} else {
//header('Location: login.php?error=1');
//}
//} else {
//header('Location: login.php?error=2');
//}

if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

if (isset($_POST['enviar'])) {
    if ($_POST['user'] == 'user' && $_POST['passw'] == '1234') {
        $_SESSION['auth'] = true;
        header('Location: formulario-subida.php');
    } else {
        header('Location: formulario-subida.php?error=1');
    }
}

$auth = $_SESSION['auth'];


?>

<!-- Vista -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Fernández Rubio">
    <title>Imagenes</title>

    <!--- CSS y JS --->

</head>

<body>
    <noscript>
        Activa el interprete de JavaScript para ver el contenido de esta página.
    </noscript>

    <h1>Galeria de fotos</h1>
    <nav>
        <a href="formulario-subida.php">Inicio</a>
        <a href="obtener-fotos.php">Ver imagenes</a>
        <?php
        if ($auth) {
            echo "<a href=\"private.php\">Subir imagenes</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        }
        ?>
    </nav>

    <h2>Imágenes:</h2>

    <br>
    <div>
        <?php
        //if ($auth) {
        //echo "<h1>Bienvenido " . $_POST['user'] . "!</h1>";
        //} else {
        //// Mostrar formulario de login si no está autentificado
        //include "view/login.view.html";
        //}
        //
        //
        // Recorrer el array
        foreach ($arrayImagenes as $imagen) {
            echo '<img src="' . $imagen . '" width="500px" heigth="500px" />';
        }

        ?>

    </div>

</body>

</html>