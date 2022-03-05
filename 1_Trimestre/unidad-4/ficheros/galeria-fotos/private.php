<?php

/**
 * @author Javer Fernandez Rubio
 */

session_start();

if (!$_SESSION['auth']) {
    header('Location: formulario-subida.php');
    exit();
}



?>

<!-- Vista -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Fernández Rubio">
    <title>Private</title>

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
        <a href="private.php">Subir imágenes</a>
        <a href="logout.php">Logout</a>
    </nav>
    <br>
    <div>
        <?php
        echo "<h1>Bienvenido !</h1><br>";
        include "view/form.view.html";
        ?>

    </div>

    <h2>Página privada</h2>
</body>

</html>