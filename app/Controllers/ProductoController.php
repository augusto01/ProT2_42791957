<?php namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function tienda()
    {
        $model = new ProductoModel();
        $productos = $model->where('activo', 1)->findAll();
        return view('front/tienda', ['productos' => $productos]);
    }

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

    public function crear()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        return view('front/producto_create');
    }

    public function guardar()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'nombre' => 'required|min_length[3]',
            'categoria' => 'required',
            'talle' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|decimal',
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpeg,image/png]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads', $newName);

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'categoria' => $this->request->getPost('categoria'),
            'talle' => $this->request->getPost('talle'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'foto' => $newName,
            'activo' => 1,
        ];

        $model = new ProductoModel();
        $model->save($data);

        return redirect()->to('productos/admin')->with('success', 'Producto creado correctamente');
    }

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
            'nombre' => $this->request->getPost('nombre'),
            'categoria' => $this->request->getPost('categoria'),
            'talle' => $this->request->getPost('talle'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('productos/admin')->with('success', 'Producto actualizado correctamente');
    }

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
