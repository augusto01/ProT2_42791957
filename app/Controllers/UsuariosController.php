<?php namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\RolModel;
use CodeIgniter\Controller;

class UsuariosController extends Controller
{
    protected $usuarioModel;
    protected $rolModel;
    protected $session;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->rolModel = new RolModel();
        $this->session = session();
    }

    // Listado de usuarios
    public function admin()
    {
        $usuarioModel = new UsuarioModel();
        $rolModel = new RolModel();

        // Recibir filtros desde GET
        $buscar = $this->request->getGet('buscar');
        $rolSeleccionado = $this->request->getGet('rol');

        // Construir consulta con filtros solo trae los usuarios activos
        $builder = $usuarioModel->select('usuarios.*, roles.tipo_usuario')
                        ->join('roles', 'roles.id = usuarios.rol_id')
                        ->where('usuarios.activo', 1);


        if ($buscar) {
            $builder->groupStart()
                ->like('usuarios.nombre', $buscar)
                ->orLike('usuarios.apellido', $buscar)
                ->orLike('usuarios.username', $buscar)
                ->groupEnd();
        }

        if ($rolSeleccionado) {
            $builder->where('usuarios.rol_id', $rolSeleccionado);
        }

        $usuarios = $builder->findAll();

        // Cargar todos los roles para el filtro
        $roles = $rolModel->findAll();

        return view('front/usuarios/usuarios_list', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'buscar' => $buscar,
            'rolSeleccionado' => $rolSeleccionado,
        ]);
    }

    // Mostrar formulario para crear usuario
    public function crear()
    {
        $roles = $this->rolModel->findAll();

        return view('front/usuarios/usuario_create', [
            'roles' => $roles,
            'session' => $this->session
        ]);
    }

    // Guardar nuevo usuario
    public function guardar()
    {
        $data = $this->request->getPost();

        // Validaciones básicas
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'username' => 'required|min_length[3]|is_unique[usuarios.username]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]',
            'rol_id' => 'required|integer'
        ]);

        if (!$validation->run($data)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Preparar datos para guardar
        $dataToSave = [
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'rol_id' => $data['rol_id']
        ];

        $this->usuarioModel->save($dataToSave);

        return redirect()->to('usuarios/admin')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario para editar usuario
    public function editar($id = null)
    {
        $usuario = $this->usuarioModel->find($id);
        if (!$usuario) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuario no encontrado");
        }

        $roles = $this->rolModel->findAll();

        return view('front/usuarios/usuario_edit', [
            'usuario' => $usuario,
            'roles' => $roles,
            'session' => $this->session
        ]);
    }

    // Actualizar usuario
    public function actualizar($id = null)
    {
        $usuario = $this->usuarioModel->find($id);
        if (!$usuario) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuario no encontrado");
        }

        $data = $this->request->getPost();

        // Reglas de validación
        $rules = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'username' => "required|min_length[3]|is_unique[usuarios.username,id,$id]",
            'email' => "required|valid_email|is_unique[usuarios.email,id,$id]",
            'rol_id' => 'required|integer'
        ];

        // Si la contraseña fue enviada, validar y actualizar
        if (!empty($data['password'])) {
            $rules['password'] = 'min_length[6]';
        }

        $validation = \Config\Services::validation();
        $validation->setRules($rules);

        if (!$validation->run($data)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $dataToUpdate = [
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'username' => $data['username'],
            'email' => $data['email'],
            'rol_id' => $data['rol_id']
        ];

        if (!empty($data['password'])) {
            $dataToUpdate['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $this->usuarioModel->update($id, $dataToUpdate);

        return redirect()->to('usuarios/admin')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function eliminar($id)
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        // Verificar si existe usuario
        $usuario = $usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        // Datos a actualizar para baja lógica
        $datos = ['activo' => 0];

        // Actualizar usuario
        if ($usuarioModel->update($id, $datos)) {
            return redirect()->to(site_url('usuarios/admin'))->with('success', 'Usuario desactivado correctamente');
        } else {
            return redirect()->back()->with('error', 'No se pudo desactivar el usuario');
        }
    }



}
