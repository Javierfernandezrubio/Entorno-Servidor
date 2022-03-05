<?php
/**
 * 
 * 
 * @author Javier Fernndez Rubio
 */

$datosPersonales = array(
    'nombre' => $_GET["nombre"],
    'apellidos' => $_GET["apellidos"]
);


echo '<form action="formulario-index.php" method="get">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="" placeholder="'.$datosPersonales["nombre"].'">
            </br>
            <label for="">Apellidos</label>
            <input type="text" name="apellidos" id="" placeholder="'.$datosPersonales["apellidos"].'">
            </br>
            <input type="submit" value="Confirma">
     </form>';
