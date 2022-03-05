<?php

/**
 * Loguear usuario
 * 
 * @author Javier Fernández Rubio
 */

session_start();

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
        header('Location: login.php');
    } else {
        header('Location: login.php?error=1');
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
    <title>Login</title>

    <!--- CSS y JS --->

</head>

<body>
    <noscript>
        Activa el interprete de JavaScript para ver el contenido de esta página.
    </noscript>

    <h1>Ejemplo Autentificación básica</h1>
    <nav>
        <a href="login.php">Inicio</a>
        <a href="public.php">Público</a>
        <?php
        if ($auth) {
            echo "<a href=\"private.php\">Privado</a>";
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
            include "view/form.view.html";
        }
        ?>

    </div>

    <h2>Página de inicio</h2>
</body>

</html>