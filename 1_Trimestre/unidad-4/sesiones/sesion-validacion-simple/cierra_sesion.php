<?php

/**
 * Cierra la sesión actual.
 * 
 * @author Javier Fernández Rubio
 */

session_start(); // recoge la sesión del otro archivo
unset($_SESSION['auth']); // destruye la sesión
session_destroy(); // destruye la sesión
header('Location: login.php'); // redirige a la página principal
