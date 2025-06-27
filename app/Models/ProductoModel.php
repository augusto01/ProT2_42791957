<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre', 'categoria_id', 'talle_id', 'descripcion', 'precio', 'foto', 'activo'
    ];

    public function getProductosConRelaciones()
    {
        return $this->select('productos.*, categorias.nombre as categoria, talles.nombre as talle')
                    ->join('categorias', 'categorias.id = productos.categoria_id')
                    ->join('talles', 'talles.id = productos.talle_id')
                    ->where('productos.activo', 1)
                    ->findAll();
    }
}
