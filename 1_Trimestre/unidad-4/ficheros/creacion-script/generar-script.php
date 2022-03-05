<?php

/**
 * Genera un script mysql o linux(bash) que recoge los datos de un fichero de texto
 * 
 * @author Javier Fernandez Rubio
 */

$alumnos = fopen($_FILES['fichero']['tmp_name'], 'r'); // Abrimos el fichero en modo lectura
$promocion = $_POST['promocion']; // Recogemos la promocion
$curso = $_POST['curso']; // Recogemos el curso
$usuarios = array(); // Creamos un array para almacenar los datos de los alumnos

/**
 * Función para generar una un usuario
 *
 * @return void
 */
function generarUsuario($nombre, array &$usuarios)
{
}


/**
 * Funcion que quita las tildes de un nombre
 *
 * @param [str] $cadena
 * @return void
 */
function quitarTildes($cadena)
{
    $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
    $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $texto = str_replace($no_permitidas, $permitidas, $cadena);
    return $texto;
}
