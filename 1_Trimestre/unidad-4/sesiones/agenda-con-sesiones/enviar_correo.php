<?php

/**
 * Enviar correo
 */
session_start(); // recoge la sesión del otro archivo

if (!isset($_SESSION['agenda']) || empty($_SESSION['agenda'])) {
    header('Location: agenda-con-sesiones.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
</head>

<body>
    <h1>Agenda de Contactos</h1>
    <a href="agenda-con-sesiones.php" rel="noopener noreferrer">Inicio</a>
    <a href="cierra_sesion.php" rel="noopener noreferrer">Cerrar sesión</a>
    <h2>Seleccionar destinatarios</h2>
    <ul>
        <?php
        // Propuesta sustituir por un checkbox de selección de destinatari
        // Añadimos contactos
        //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$nombre = clearData($_POST["nombre"]);
        //$telefono = clearData($_POST["telefono"]);
        //$email = clearData($_POST["email"]);
        //
        //if (empty($nombre)) {
        //$error .= "El nombre no puede estar vacío<br>";
        //}
        //
        //if (empty($telefono)) {
        //$error .= "El teléfono no puede estar vacío<br>";
        //}
        //
        //if (empty($email)) {
        //$error .= "El email no puede estar vacío<br>";
        //}
        //
        //if (empty($error)) {
        //$agenda[] = array(
        //"nombre" => $nombre,
        //"telefono" => $telefono,
        //"email" => $email
        //);
        //}
        //}

        // Mostramos los contactos
        foreach ($_SESSION['agenda'] as $contacto) {
            echo "<li>" . $contacto["nombre"] . ": " . $contacto["telefono"] . " - " . $contacto["email"] . "</li>";
        }

        ?>
    </ul>
</body>

</html>