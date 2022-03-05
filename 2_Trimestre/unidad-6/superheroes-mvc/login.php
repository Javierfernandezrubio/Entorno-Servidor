<?php

/**
 * Loguear usuario
 * 
 * @author Javier Fernández Rubio
 */

include "../include/constantes.php";
include "../usuarios/usuario.php";

session_start();

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
    $_SESSION['logeo'] = array();
}

if (isset($_POST['enviar'])) {

    $nombre = "";
    $contrasena = "";

    if (isset($_POST['user'])) {
        $nombre = clearData($_POST['user']);
    }
    if (isset($_POST['passw'])) {
        $contrasena = clearData($_POST['passw']);
    }

    if ($nombre == "") {
        $mensaje = "El nombre no puede estar vacío";
    } elseif ($contrasena == "") {
        $mensaje = "La contraseña no puede estar vacía";
    } else {
        $mensaje = "";
    }

    $usuario = Usuario::getInstancia();

    $posibleUsuario = $usuario->login($nombre, $contrasena);

    foreach ($posibleUsuario as $key ) {
        if ($key["nombre"] == $nombre && $key["contraseña"] == $contrasena) {
            $_SESSION['auth'] = true;
            $_SESSION['logeo'] = $posibleUsuario;
            header("Location: buscar.php");
        } else {
            $mensaje = "Usuario o contraseña incorrectos";
        }
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

    <h1>Login en SuperHeroe</h1>
    <div>
        <?php
        if ($auth) {
            header('Location: buscar.php');
        } else {
            include "views/form.view.html";
        }
        ?>

    </div>
</body>

</html>