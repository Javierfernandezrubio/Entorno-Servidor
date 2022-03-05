<?php
$divisor = 0;
$dividendo = 10;
try {
    echo $dividendo % $divisor;
} catch (ArithmeticError $th) { //tipo de error
    echo "Error: " . $th->getMessage();
    die();
}
