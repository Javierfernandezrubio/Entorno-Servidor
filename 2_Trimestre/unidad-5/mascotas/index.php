<?php

/**
 * Index principal de la aplicación
 * 
 * @author Javier Fernandez Rubio
 */

//require_once "apps/models/Perro.php";
//require_once "apps/models/Persona.php";
require_once "vendor/autoload.php";

use App\models\Perro;
use App\models\Persona;

// Desde php 7 es posible app\models\{Perro, Persona}

$perro = new Perro("Firulais", "Blanco");
echo "Dame la pata";
$perro->darPata();
echo "<br/>";
echo "Entrenar";
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
echo "<br/>";
echo "Dame la pata";
echo "<br/>";
$perro->darPata();
