<?php namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\RolModel;  // Modelo para roles (crealo si no existe)
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController {
    use ResponseTrait;

    // Registro de usuarios (API)
    public function register() {
        $raw = $this->request->getBody();
        $json = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->fail('JSON inválido: ' . json_last_error_msg(), 400);
        }

        // Validar datos
        $rules = [
                'nombre'   => 'required|min_length[3]',
                'apellido' => 'required|min_length[3]',
                'username' => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[usuarios.email]',
                'password' => 'required|min_length[6]',
                'rol_id'   => 'required|in_list[1,2]',
            ];


        if (!$this->validateData($json, $rules)) {
            return $this->fail($this->validator->getErrors());
        }

        // Guardar
        $model = new UsuarioModel();
        $data = [
            'nombre'    => $json['nombre'],
            'apellido'  => $json['apellido'],
            'username'  => $json['username'],
            'email'     => $json['email'],
            'password'  => password_hash($json['password'], PASSWORD_DEFAULT),
            'rol_id'    => $json['rol_id']
        ];

        $model->save($data);

        return $this->respondCreated(['message' => 'Usuario registrado correctamente']);
    }

    // Proceso de login (formulario)
    public function loginProcess()
    {
        $login = $this->request->getPost('login');  // campo que puede ser email o username
        $password = $this->request->getPost('password');

        $model = new UsuarioModel();

        // Buscar usuario donde el email o username coincida con $login
        $usuario = $model->select('usuarios.*, roles.tipo_usuario')
                        ->join('roles', 'roles.id = usuarios.rol_id')
                        ->groupStart()
                            ->where('usuarios.email', $login)
                            ->orWhere('usuarios.username', $login)
                        ->groupEnd()
                        ->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'usuario' => $usuario['nombre'],
                'email' => $usuario['email'],
                'rol' => $usuario['tipo_usuario'],  // Ahora guardamos el nombre del rol
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    // Método para mostrar listado de usuarios en la vista admin
    public function usuariosAdmin()
    {
        $model = new UsuarioModel();

        // Obtener posibles filtros por GET (ejemplo: búsqueda por nombre o email)
        $buscar = $this->request->getGet('buscar');
        $rol_id = $this->request->getGet('rol_id');

        $builder = $model->select('usuarios.*, roles.tipo_usuario')
                         ->join('roles', 'roles.id = usuarios.rol_id');

        // Aplicar filtros si vienen
        if (!empty($buscar)) {
            $builder->groupStart()
                    ->like('usuarios.nombre', $buscar)
                    ->orLike('usuarios.apellido', $buscar)
                    ->orLike('usuarios.email', $buscar)
                    ->orLike('usuarios.username', $buscar)
                    ->groupEnd();
        }

        if (!empty($rol_id)) {
            $builder->where('usuarios.rol_id', $rol_id);
        }

        $usuarios = $builder->findAll();

        // Obtener roles para filtros select
        $rolModel = new RolModel();
        $roles = $rolModel->findAll();

        // Pasar datos a la vista
        return view('front/usuarios/usuarios_list', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'buscar' => $buscar,
            'rolSeleccionado' => $rol_id,
        ]);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
