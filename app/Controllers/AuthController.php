<?php namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController {
    use ResponseTrait;

    public function register() {
        $json = $this->request->getJSON(true); // ← convierte JSON a array asociativo

        if (!$json) {
            return $this->fail('No se recibió JSON válido', 400);
        }

        // Validar datos
        $rules = [
            'nombre' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validateData($json, $rules)) {
            return $this->fail($this->validator->getErrors());
        }

        // Guardar usuario
        $model = new UsuarioModel();
        $data = [
            'nombre'   => $json['nombre'],
            'apellido' => $json['apellido'],
            'email'    => $json['email'],
            'password' => password_hash($json['password'], PASSWORD_DEFAULT)
        ];

        $model->save($data);
        return $this->respondCreated(['message' => 'Usuario registrado correctamente']);
    }
}
