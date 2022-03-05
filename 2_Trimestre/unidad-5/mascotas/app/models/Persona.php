<?php

/**
 * Clase persona
 * 
 * @author Javier Fernandez Rubio
 */

namespace App\Models; // Espacio de nombre

class Persona
{
    private $_nombre;
    private $_apellido1;
    private $_apellido2;

    public function construct($nombre, $apellido1, $apellido2)
    {
        $this->_nombre = $nombre;
        $this->_apellido1 = $apellido1;
        $this->_apellido2 = $apellido2;
    }
    public function destruct()
    {
        echo $this->_nombre . " destruido";
    }

    public function saluda()
    {
        echo "Hola Mundo<br>";
    }
    public function Nombre()
    {
        return $this->_nombre . " " . $this->_apellido1 . " " . $this->_apellido2;
    }
}
