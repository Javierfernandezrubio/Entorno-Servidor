<?php
/**
 * @author Javier Fernandez Rubio
 * 
 * Almacena tres números en variables y escribirlos en pantalla de manera ordenada.
 * 
 */
    $number1 = 1;
    $number2 = 2;
    $number3 = 3;

    if ($number1 > $number2 && $number2 > $number3){
        echo "Primer número: ".$number1."<br/>";
        echo "Segundo número: ".$number2."<br/>";
        echo "Tercer número: ".$number3."<br/>";
    }
    else if ($number2 > $number1 && $number1 > $number3) {
        echo "Primer número: ".$number2."<br/>";
        echo "Segundo número: ".$number1."<br/>";
        echo "Tercer número: ".$number3."<br/>";
    }
    else if ($number3 > $number2 && $number2 > $number1){
        echo "Primer número: ".$number3."<br/>";
        echo "Segundo número: ".$number2."<br/>";
        echo "Tercer número: ".$number1."<br/>";
    }
    else if ($number1 > $number2 && $number1 < $number3){
        echo "Primer número: ".$number3."<br/>";
        echo "Segundo número: ".$number1."<br/>";
        echo "Tercer número: ".$number2."<br/>";
    }
    else if ($number2 > $number1 && $number1 < $number3){
        echo "Primer número: ".$number3."<br/>";
        echo "Segundo número: ".$number1."<br/>";
        echo "Tercer número: ".$number2."<br/>";
    }

?>