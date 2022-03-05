<?php

/**
 * Base de datos con php sobre superheroes
 * clase que borrar un registro de la tabla superheroes
 * 
 * @author Javier Fernandez Rubio
 * 
 */
include "conexionBD.php";

$db = conectarBD();
$id = $_GET['id'];



$sql = "DELETE FROM superheroes WHERE id = $id";
if ($db->query($sql)) {
    echo "Registro borrado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

echo "<br><a href='index.php'>Volver</a>";
