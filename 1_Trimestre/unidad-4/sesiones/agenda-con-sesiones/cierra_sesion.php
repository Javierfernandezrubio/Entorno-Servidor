<?php

/**
 * Cierra la sesión actual.
 * 
 * @author Javier Fernández Rubio
 */

session_start(); // recoge la sesión del otro archivo
unset($_SESSION['agenda']); // destruye la sesión
session_destroy(); // destruye la sesión
header('Location: agenda-con-sesiones.php'); // redirige a la página principal
