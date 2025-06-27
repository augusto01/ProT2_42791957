<?php namespace App\Models;

use CodeIgniter\Model;

class TalleModel extends Model
{
    protected $table      = 'talles';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre'];
}
