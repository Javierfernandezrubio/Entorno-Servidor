<?php

/**
 * Desarrolla una aplicación que genere un script para creación de usuarios a partir de un fichero.
 * 
 * @author Javier Fernandez Rubio
 * 
 */

session_start();

if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

if (isset($_POST['enviar'])) {
    if ($_POST['user'] == 'user' && $_POST['passw'] == '1234') {
        $_SESSION['auth'] = true;
        header('Location: index.php');
    } else {
        header('Location: index.php?error=1');
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
    <title>Generador de Script</title>

    <!--- CSS y JS --->

</head>

<body>
    <noscript>
        Activa el interprete de JavaScript para ver el contenido de esta página.
    </noscript>

    <h1>Subida de ficheros</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <?php
        if ($auth) {
            echo "<a href=\"private.php\">Subir fichero</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        }
        ?>
    </nav>
    <br>
    <div>
        <?php
        if ($auth) {
            echo "<h1>Bienvenido " . $_POST['user'] . "!</h1>";
        } else {
            // Mostrar formulario de login si no está autentificado
            include "view/login.view.html";
        }
        ?>

    </div>

    <h2>Página de inicio</h2>
</body>

</html>