<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'username', 'email', 'password', 'rol_id'];
    protected $useTimestamps = true;

    /**
     * Obtiene los usuarios junto con el tipo de rol desde la tabla roles
     *
     * @return array
     */
    public function obtenerConRol()
    {
        return $this->select('usuarios.*, roles.tipo_usuario')
                    ->join('roles', 'roles.id = usuarios.rol_id')
                    ->findAll();
    }
}
