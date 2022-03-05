<?php
/**
 * @author Javier Fernández Rubio
 * Pon ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.
 */

    class Clase {
        public $var;
        public $miArray;

        function miFuncion()
        {
            $this->var = 'Programación en PHP';
            $this->miArray = array('Perro', 'Gato', 'Liebre');
        }
    }

    $miClase = new Clase;
    $miClase->miFuncion();
    $nombre = "Diego";

    echo <<<EOT
    Mi nombre es $nombre. Esto es un artículo de $miClase->var.
    Tengo un {$miClase->miArray[0]} y un {$miClase->miArray[1]}.
    Lo siguiente es una D mayúscula: \x44
    EOT;

?>