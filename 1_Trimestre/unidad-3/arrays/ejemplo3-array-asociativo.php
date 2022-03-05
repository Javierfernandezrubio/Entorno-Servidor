<?php
/**
 * @author Javier Fernandez Rubio
 *  
 */
$frutas = array(

    "manzana" => array(
    
    "color" => "rojo",
    "sabor" => "dulce",
    "forma" => "redondeada"),
    
    "naranja" => array(
    
    "color" => "naranja",
    "sabor" => "ácido",
    "forma" => "redondeada"),
    
    "plátano" => array(
    
    "color" =>"amarillo",
    "sabor" => "paste-y",
    "forma" => "aplatanada")
    
    );



foreach ($frutas as $fruta => $caracteriticas){
    echo $fruta.": <br/>";
    foreach ($caracteriticas as $tipo => $valor){
        echo $tipo.": ".$valor;
        echo "<br/>";
    }
    echo "<br/>";
}