<?php namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController {
    use ResponseTrait;

    // Registro de usuarios (API)
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

    // Proceso de login (formulario)
    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new UsuarioModel();
        $usuario = $model->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'usuario' => $usuario['nombre'],
                'email'   => $usuario['email'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    // Cierre de sesión
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
