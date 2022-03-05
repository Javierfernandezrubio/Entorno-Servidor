<?php
/**
 * Clase contador
 * 
 * @author Javier Fernandez Rubio
 */

 class Contador
 {
    private $contador;
    private static $instancias;

    /**
     * Constructor de la clase
     * 
     * @param int $contador
     * @param int $instancias
     */
    public function __construct($contador = 0)
    {
        $this->contador = $contador;
        self::$instancias++;
    }

    /**
     * Incrementa el contador
     * 
     * @return void
     */
    public function incrementar()
    {
        $this->contador++;
    }

    /**
     * getContador
     * 
     * @return int
     */
    public function getContador()
    {
        return $this->contador;
    }

    /**
     * getInstancias
     * 
     * @return int
     */
    public static function getInstancias()
    {
        return self::$instancias;
    }

    /**
     * Contar
     * 
     * @return void
     */
    public function contar()
    {
        $this->contador++;
        return $this;
    }

    /**
     * Función toString
     *
     * @return string
     */
    public function __toString()
    {
        return "Contador nº{$this->contador}";
    }

    /**
     * Destructor de la clase
     * 
     * @return void
     */
    public function __destruct()
    {
        echo "Destruyendo la instancia " . self::getInstancias() . " de la clase Contador<br>";
        self::$instancias--;
    }


 }