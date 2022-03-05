<?php
/* Ver errores */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Front Controller
 *
 * @author Javier Fenández Rubio
 */

require '../bootstrap.php';
require_once '../vendor/autoload.php';

use App\Models\EvolucionModel;



$evolucion = new EvolucionModel("hola");
$evolucion = $evolucion->get();
var_dump($evolucion);

?>