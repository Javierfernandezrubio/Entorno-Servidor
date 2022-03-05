<?php 

include("constantes.php");
include("Superheroe.php");

/* $datos = array(
    "nombre"=> "Elektra",
    "capacidades"=> "lucha"
);

echo "Añadimos un registro" . "<br>";

$sh = Superheroe::getInstancia();
//$sh->set($datos);
$sh->get(15);
var_dump($sh); */

#Persistiendo desde la entidad
$sh1 = new Superheroe();
$sh1->setNombre("Batman");
$sh1->setCapacidades("lucha");
$sh1->set();
$id = $sh1->lastInsert();
//$sh1->setId($id);


$result = $sh1->getAll();

foreach ($result as $sh) {
    echo $sh->getNombre() . "<br>";
}
?>