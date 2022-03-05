<?php
namespace App\Models;


class EvolucionModel extends DBAbstractModel{
    private $evolucion;

    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function ___clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private function __construct($evolucion)
    {
        $this->evolucion = $evolucion;
    }

    public function get(){
        $this->query = "SELECT * FROM evolucion";
        $this->get_results_from_query();
        if(count($this->rows) > 0){
            $this->evolucion = $this->rows[0];
        }
        return $this->evolucion;

    }

    public function set(){

    }

    public function edit(){

    }

    public function delete(){

    }

    public function getAll(){
        $this->query = "SELECT * FROM evoluciones";
        $this->get_results_from_query();
        if(count($this->rows) > 0){
            $this->mensaje = "Evoluciones encontradas";
            return $this->rows;
        }else{
            $this->mensaje = "No se encontraron evoluciones";
            return false;
        }
    }

}
