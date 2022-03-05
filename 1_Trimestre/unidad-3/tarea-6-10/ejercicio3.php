<?php
/**
 * Escribe un programa que genere tres números aleatorios correspondientes a la fecha de
 * nacimiento (día, mes, año) de una persona. Debes garantizar que la fecha generada es válida.
 * El script mostrará en pantalla la fecha y una imagen con el signo del zodiaco de la persona.
 * 
 * @author Javier Fernandez Rubio
 * date 6/10/2021
 */

    
$dia = rand(1,31);
$mes = rand(1,12);
$anio = rand(1940,2021);        
$fecha = $dia."/".$mes."/".$anio;
echo "La fecha de la persona es: ".$fecha."</br>";

//Signo del zodiaco segun la fecha
if($dia >= 21 && $mes == 3){
    echo "Tu signo del zodiaco es: Aries</br>";
    echo '<img src="https://es.wikipedia.org/wiki/Aries_(astrolog%C3%ADa)#/media/Archivo:Aries,_Blanco_y_Negro,_de_Arija,_05-03-1904_(cropped).svg"></img>';
}elseif($dia <= 20 && $mes == 4){
    echo "Tu signo del zodiaco es: Aries</br>";
    echo '<img src="https://es.wikipedia.org/wiki/Aries_(astrolog%C3%ADa)#/media/Archivo:Aries,_Blanco_y_Negro,_de_Arija,_05-03-1904_(cropped).svg"></img>';
}elseif($dia >= 21 && $mes == 4){
    echo "Tu signo del zodiaco es: Tauro";
}elseif($dia <= 20 && $mes == 5){
    echo "Tu signo del zodiaco es: Tauro";
}elseif($dia >= 21 && $mes == 5){
    echo "Tu signo del zodiaco es: Géminis";
}elseif($dia <= 20 && $mes == 6){
    echo "Tu signo del zodiaco es: Géminis";
}elseif($dia >= 21 && $mes == 6){
    echo "Tu signo del zodiaco es: Cáncer";
}elseif($dia <= 20 && $mes == 7){
    echo "Tu signo del zodiaco es: Cáncer";
}elseif($dia >= 21 && $mes == 7){
    echo "Tu signo del zodiaco es: Leo";
}elseif($dia <= 20 && $mes == 8){
    echo "Tu signo del zodiaco es: Leo";
}elseif($dia >= 21 && $mes == 8){
    echo "Tu signo del zodiaco es: Virgo";
}elseif($dia <= 20 && $mes == 9){
    echo "Tu signo del zodiaco es: Virgo";
}elseif($dia >= 21 && $mes == 9){
    echo "Tu signo del zodiaco es: Libra";
}elseif($dia <= 20 && $mes == 10){
    echo "Tu signo del zodiaco es: Libra";
}elseif($dia >= 21 && $mes == 10){
    echo "Tu signo del zodiaco es: Escorpio";
}elseif($dia <= 20 && $mes == 11){
    echo "Tu signo del zodiaco es: Escorpio";
}elseif($dia >= 21 && $mes == 11){
    echo "Tu signo del zodiaco es: Sagitario";
}elseif($dia <= 20 && $mes == 12){
    echo "Tu signo del zodiaco es: Sagitario";
}elseif($dia >= 21 && $mes == 12){
    echo "Tu signo del zodiaco es: Capricornio";
}elseif($dia <= 20 && $mes == 1){
    echo "Tu signo del zodiaco es: Capricornio";
}elseif($dia >= 21 && $mes == 1){
    echo "Tu signo del zodiaco es: Acuario";
}elseif($dia <= 20 && $mes == 2){
    echo "Tu signo del zodiaco es: Acuario";
}elseif($dia >= 21 && $mes == 2){
    echo "Tu signo del zodiaco es: Piscis";
}elseif($dia <= 20 && $mes == 3){
    echo "Tu signo del zodiaco es: Piscis";
}
