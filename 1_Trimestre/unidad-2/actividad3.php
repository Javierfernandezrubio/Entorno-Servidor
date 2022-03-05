<?php
/**
 * @author Javier Fernández Rubio
 * 
 * Script que, a partir del radio almacenado en una variable y la definición de la constante PI, calcule el
 * área del círculo y la longitud de la circunferencia. El debe mostrar valor de radio, longitud de la
 * circunferencia, área del círculo y dibujará un círculo utilizando gráficos vectoriales.
 * 
 */

    $radio= 50;
    define("PI",3.1416); // Definicion de la constante de Pi
    $area= ($radio**2) * PI; // Area: PI*Radio^2
    $longuitud= 2 * PI * $radio; // Longuitud: 2*PI*Radio

    echo "<h2>Circulo de $radio de radio</h2>";
    echo "<p>Longuitud: $longuitud</p>";
    echo "<p>Area: $area</p>";
    echo "<p>Dibujo del circulo:</p>";
    echo "<svg width=\"2*$radio\" height=\"2*$radio\">
            <circle cx=\"100\" cy=\"100\" r=\"$radio\" stroke=\"black\" stroke-width=\"1\" fill=\"white\"/>
        </svg>";


?>