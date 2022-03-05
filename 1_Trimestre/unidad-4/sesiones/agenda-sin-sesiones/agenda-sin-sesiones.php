<?php

/**
 * Agenda de contactos
 * Ejercicio sin sesiones
 *
 * @author   Javier Fernández Rubio
 */

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Declaramos las variables
$agenda = array();
$nombre = $telefono = $email = $error = "";

// Formulario agenda de contactos

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
    <h2>Nuevo contacto:</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        <br>
        <label for="telefono">Teléfono:</label>
        <br>
        <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>">
        <br>
        <label for="email">Email:</label>
        <br>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <br>
        <input type="submit" value="Añadir">
        <input type="hidden" name="contactos" value="<?php echo $contactos ?>">
    </form>

    <h2>Listado de contactos:</h2>
    <ul>
        <?php
        // Añadimos contactos
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = clearData($_POST["nombre"]);
            $telefono = clearData($_POST["telefono"]);
            $email = clearData($_POST["email"]);

            if (empty($nombre)) {
                $error .= "El nombre no puede estar vacío<br>";
            }

            if (empty($telefono)) {
                $error .= "El teléfono no puede estar vacío<br>";
            }

            if (empty($email)) {
                $error .= "El email no puede estar vacío<br>";
            }

            if (empty($error)) {
                $agenda[] = array(
                    "nombre" => $nombre,
                    "telefono" => $telefono,
                    "email" => $email
                );
            }
        }

        // Mostramos los contactos
        foreach ($agenda as $contacto) {
            echo "<li>" . $contacto["nombre"] . ": " . $contacto["telefono"] . " - " . $contacto["email"] . "</li>";
        }

        ?>
    </ul>
</body>

</html>