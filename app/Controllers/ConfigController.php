<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class ConfigController extends BaseController
{
    use ResponseTrait;
    
    public function getConfig()
    {
        return $this->respond([
            'apiUrl' => config('App')->baseURL . 'api/'
        ]);
    }
}