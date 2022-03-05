<?php

/**
 * @author Javer Fernandez Rubio
 */

session_start();

if (!$_SESSION['auth']) {
    header('Location: index.php');
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
    <title>Subir fichero</title>

    <!--- CSS y JS --->

</head>

<body>
    <noscript>
        Activa el interprete de JavaScript para ver el contenido de esta página.
    </noscript>

    <h1>Subida de ficheros</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="private.php">Subir fichero</a>
        <a href="logout.php">Logout</a>
    </nav>
    <br>
    <div>
        <h2>Página subida de fichero y generación de script</h2>
        <?php
        echo "<h1>Bienvenido !</h1><br>";
        include "view/form.view.html";
        ?>

    </div>

    
</body>

</html>