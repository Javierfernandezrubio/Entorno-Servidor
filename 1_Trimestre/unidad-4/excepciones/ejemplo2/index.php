<?php
$divisor = 0;
$dividendo = 10;
try {
    echo $dividendo % $divisor;
} catch (Error $th) {
    echo "Error: " . $th->getMessage();
    die();
}