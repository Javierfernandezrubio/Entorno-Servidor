<?php

//CONSTRUCCIÓN DEL MODELO SINGLETON//
require_once('DBAbstractModel.php');
class Superheroe extends DBAbstractModel
{

    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            //$miclase = Superheroe;
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $capacidades;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setCapacidades($capacidades)
    {
        $this->capacidades = $capacidades;
    }

    public function setId()
    {
        $this->id = $id;
    }

    public function set()
    {
        /* foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        } */
        $this->query = "INSERT INTO superheroes(nombre, capacidades)
                        VALUES(:nombre, :capacidades)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['capacidades'] = $this->capacidades;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get()
    {
        $this->query = "SELECT * FROM superheroes WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH obtenido correctamente';
    }


    public function getAll()
    {
        $this->query = "SELECT * FROM superheroes";
        $this->get_results_from_query();
        $this->mensaje = 'SHs obtenidos correctamente';
        return $this->rows;
    }

    public function getByNombre()
    {
        $this->query = "SELECT * FROM superheroes WHERE nombre = :nombre";
        $this->parametros['nombre'] = $this->nombre;
        $this->get_results_from_query();
        $this->mensaje = 'SH obtenido correctamente';
    }

    # Crear un nuevo usuario comprobando por código que no exista
    public function set1($sh_data = array())
    {
        // control de insercion
        if (array_key_exists('id', $sh_data)) {
            $this->nombre = $sh_data['id'];
        }
    }

    /**
     * Método para traer un libro de la base de datos por clave primaria.
     * Carga los resultados en el array definido en la clase abstracta.
     *
     * @param int id. Identificador de la entidad.
     * @return datos.
     */
    public function getID($id = '')
    {
        if ($id != '') {
            $this->query = "
            SELECT *
            FROM superheroes
            WHERE id = :id";
            //Cargamos los parámetros.
            $this->parametros['id'] = $id;
            //Ejecutamos consulta que devuelve registros.
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        } else {
            $this->mensaje = 'sh no encontrado';
        }
        return $this->rows;
    }

    /**
     * Método para actualizar un superheroe de la base de datos.
     *
     * @param array $datos. Array asociativo con los datos a actualizar.
     * @return bool.
     */
    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
                UPDATE superheroes
                SET nombre=:nombre,
                capacidades=:capacidades
                WHERE id = :id
                ";
        // $this->parametros['id']=$id;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['capacidades'] = $capacidades;
        $this->get_results_from_query();
        $this->mensaje = 'sh modificado';
    }


    /**
     * Método para eliminar un superheroe de la base de datos.
     *
     * @param int $id. Identificador de la entidad.
     * @return bool.
     */
    public function delete($id = '')
    {
        $this->query = "DELETE FROM superheroes
                        WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }
    # Método constructor
    function __construct()
    {
        // Singleton no recomienda parámetros ya que
        // podría dificultar la lectura de las instancias.
    }
}
