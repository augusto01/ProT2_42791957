<?php namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    // Vista clientes - solo productos activos
    public function tienda()
    {
        $model = new ProductoModel();
        $productos = $model->where('activo', 1)->findAll();

        return view('front/tienda', ['productos' => $productos]);
    }

    // Vista admins - productos activos con edición
    public function tiendaAdmin()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $model = new ProductoModel();

        $busqueda = $this->request->getGet('buscar');
        if ($busqueda) {
            $productos = $model
                ->like('nombre', $busqueda)
                ->orLike('categoria', $busqueda)
                ->orLike('talle', $busqueda)
                ->where('activo', 1)
                ->findAll();
        } else {
            $productos = $model->where('activo', 1)->findAll();
        }

        return view('front/tienda_admin', [
            'productos' => $productos,
            'buscar' => $busqueda
        ]);
    }


    // Mostrar formulario para crear producto
    public function crear()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        return view('front/producto_create');
    }

    // Guardar producto nuevo
    public function guardar()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'nombre'      => 'required|min_length[3]',
            'categoria'   => 'required',
            'descripcion' => 'required',
            'talle'       => 'required',
            'precio'      => 'required|decimal',
            'foto'        => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads', $newName);

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'categoria'   => $this->request->getPost('categoria'),
            'descripcion' => $this->request->getPost('descripcion'),
            'talle'       => $this->request->getPost('talle'),
            'foto'        => $newName,
            'precio' => $this->request->getPost('precio'),
            'activo'      => 1,
        ];

        $model = new ProductoModel();
        $model->save($data);

        return redirect()->to('productos/admin')->with('success', 'Producto creado correctamente');
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $model = new ProductoModel();
        $producto = $model->find($id);

        if (!$producto) {
            return redirect()->to('productos/admin')->with('error', 'Producto no encontrado');
        }

        return view('front/producto_edit', ['producto' => $producto]);
    }

    // Actualizar producto existente
    public function actualizar($id)
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $model = new ProductoModel();
        $producto = $model->find($id);

        if (!$producto) {
            return redirect()->to('productos/admin')->with('error', 'Producto no encontrado');
        }

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'categoria'   => $this->request->getPost('categoria'),
            'descripcion' => $this->request->getPost('descripcion'),
            'talle'       => $this->request->getPost('talle'),
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('productos/admin')->with('success', 'Producto actualizado');
    }

    // Baja lógica del producto
    public function eliminar($id)
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $model = new ProductoModel();
        $model->update($id, ['activo' => 0]);

        return redirect()->to('productos/admin')->with('success', 'Producto eliminado');
    }
}
