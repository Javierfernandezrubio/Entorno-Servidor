<?php
namespace App\Models;

/**
 * Clase Superheroe
 * 
 * 
 * @author Javier Fernandez Rubio
 */

// require_once('include/DBAbstractModel.php'); No hace falta al estar en el mismo espacio de nombres
class Superheroe extends DBAbstractModel
{
    
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
    
    
    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;
    
    function _construct()
    {
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public  function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set($user_data = array())
    {
        /* foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        } */
        $this->query = "INSERT INTO superheroes(nombre, velocidad)
            VALUES(:nombre, :velocidad)";

        $this->parametros['nombre'] = $nombre;
        $this->parametros['velocidad'] = $velocidad;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id = '')
    {

        if ($id != '') {
            $this->query = "SELECT * FROM superheroes WHERE id=:id";

            $this->parametros['id'] = $id;

            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "sh encontrado";
        } else {
            $this->mensaje = "sh no encontrado";
        }
        return $this->rows;
    }

    public function getNombre($nombre = '')
    {

        if ($nombre != '') {
            $this->query = "SELECT * FROM superheroes WHERE nombre=:nombre";

            $this->parametros['nombre'] = $nombre;

            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows as $propiedad => $value) {
                # code...
                $this->$propiedad = $value;
            }
            $this->mensaje = "sh encontrado";
        } else {
            $this->mensaje = "sh no encontrado";
        }
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM superheroes ";
        $this->get_results_from_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "sh encontrado";
        } else {
            $this->mensaje = "sh no encontrado";
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
        UPDATE superheroes
        SET nombre=:nombre,
        velocidad=:velocidad
        WHERE id=:id";

        $this->parametros['nombre'] = $nombre;
        $this->parametros['velocidad'] = $velocidad;
        $this->get_results_from_query();
        $this->mensaje = 'SH modificado';
    }

    public function update($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE superheroes SET velocidad=:velocidad WHERE Nombre=:nombre";

        $this->parametros['velocidad'] = $velocidad;
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        $this->mensaje = 'SH modificado';
    }

    public function delete($id = '')
    {
        $this->query = "DELETE FROM superheroes
                      WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }
    
    public function guardarenBD()
    {
        $this->query = "INSERT INTO superheroes(nombre,velocidad)
                            VALUES(:nombre,:velocidad)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['velocidad'] = $this->velocidad;
        $this->get_results_from_query();
        $this->mensaje = "Superhéroes añadido";
        return $this->mensaje;
    }
}
