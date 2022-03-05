<?php 

include("constantes.php");
include("Superheroe.php");

$datos = array(
    "nombre"=> "Elektra",
    "capacidades"=> "lucha"
);

echo "Añadimos un registro" . "<br>";

$sh = Superheroe::getInstancia();
//$sh->set($datos);
$sh->get(15);
var_dump($sh);

?>