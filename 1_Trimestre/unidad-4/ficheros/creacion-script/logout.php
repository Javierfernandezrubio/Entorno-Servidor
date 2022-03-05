<?php

/**
 * Cierra la sesión actual.
 * 
 * @author Javier Fernández Rubio
 */

session_start(); // recoge la sesión del otro archivo
if (isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;  // cierra la sesión, ya no estamos en el sistema
}
//unset($_SESSION['auth']); // destruye la sesión
//session_destroy(); // destruye la sesión
header('Location: index.php'); // redirige a la página principal
