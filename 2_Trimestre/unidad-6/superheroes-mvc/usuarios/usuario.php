<?php
/**
 * Clase usuario
 *
 *
 *
 * @author Javier Fernández Rubio
 */

require_once '../include/DBAbstractModel.php';
class Usuario extends DBAbstractModel
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
    private $contrasena;
    private $perfil;
    private $created_at;
    private $updated_at;

    public function _construct()
    {
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
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
        $this->query = "INSERT INTO usuarios(nombre, contraseña, perfil)
                VALUES(:nombre, :contraseña, :perfil)";

        $this->parametros['nombre'] = $nombre;
        $this->parametros['contrasena'] = $contrasena;
        $this->parametros['perfil'] = $perfil;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function get($id = '')
    {

        if ($id != '') {
            $this->query = "SELECT * FROM usuarios WHERE id=:id";

            $this->parametros['id'] = $id;

            $this->get_results_from_query();
        } else {
            $this->query = "SELECT * FROM usuarios";

            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            $this->mensaje = 'Usuario encontrado';
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
        return $this->rows;
    }

    public function getNombre($nombre = '')
    {
        if ($nombre != '') {
            $this->query = "SELECT * FROM usuarios WHERE nombre=:nombre";

            $this->parametros['nombre'] = $nombre;

            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "Usuario encontrado";
        } else {
            $this->mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM usuarios";

        $this->get_results_from_query();

        if (count($this->rows) >= 1) {
            foreach ($this->rows as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "Usuarios encontrados";
        } else {
            $this->mensaje = "Usuarios no encontrados";
        }
        return $this->rows;
    }

    public function insert()
    {
        $this->query = "INSERT INTO usuarios(nombre, contraseña, perfil)
                VALUES(:nombre, :contraseña, :perfil)";

        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['contraseña'] = $this->contrasena;
        $this->parametros['perfil'] = $this->perfil;

        $this->get_results_from_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function update($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE usuarios SET nombre=:nombre, contraseña=:contraseña, perfil=:perfil, updated_at=:updated_at WHERE id=:id";

        $this->parametros['nombre'] = $nombre;
        $this->parametros['contraseña'] = $contrasena;
        $this->parametros['perfil'] = $perfil;
        $this->parametros['updated_at'] = $updated_at;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = 'Usuario actualizado correctamente';
    }

    public function delete($id = '')
    {
        $this->query = "DELETE FROM usuarios WHERE id=:id";

        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = 'Usuario eliminado correctamente';
    }

    public function login($nombre = '', $contrasena = '')
    {
        $this->query = "SELECT * FROM usuarios WHERE nombre=:nombre AND contraseña=:contraseña";

        $this->parametros['nombre'] = $nombre;
        $this->parametros['contraseña'] = $contrasena;

        $this->get_results_from_query();
        /* if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "Usuario encontrado";
        } else {
            $this->mensaje = "Usuario no encontrado";
        } */
        return $this->rows;
    }

}
