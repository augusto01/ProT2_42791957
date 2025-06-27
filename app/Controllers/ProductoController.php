<?php namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\TalleModel;



class ProductoController extends BaseController
{
    public function tienda()
    {
        $model = new ProductoModel();
        $productos = $model->getProductosConRelaciones();
        return view('front/tienda', ['productos' => $productos]);
    }

   public function tiendaAdmin()
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();
        $talleModel = new TalleModel();

        // Obtener filtros desde GET
        $buscar = $this->request->getGet('buscar');
        $categoriaId = $this->request->getGet('categoria');
        $talleId = $this->request->getGet('talle');

        // Construcción de la consulta
        $query = $productoModel
            ->select('productos.*, categorias.nombre as categoria, talles.nombre as talle')
            ->join('categorias', 'categorias.id = productos.categoria_id')
            ->join('talles', 'talles.id = productos.talle_id')
            ->where('productos.activo', 1); // solo productos activos

        if ($buscar) {
            $query->like('productos.nombre', $buscar);
        }

        if ($categoriaId) {
            $query->where('productos.categoria_id', $categoriaId);
        }

        if ($talleId) {
            $query->where('productos.talle_id', $talleId);
        }

        $productos = $query->findAll();

        return view('front/tienda_admin', [
            'productos' => $productos,
            'buscar' => $buscar,
            'categorias' => $categoriaModel->findAll(),
            'talles' => $talleModel->findAll(),
            'categoriaSeleccionada' => $categoriaId,
            'talleSeleccionado' => $talleId
        ]);
    }





    public function crear()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        // Instanciar modelos
        $categoriaModel = new \App\Models\CategoriaModel();
        $talleModel = new \App\Models\TalleModel();

        return view('front/producto_create', [
            'categorias' => $categoriaModel->findAll(),
            'talles'     => $talleModel->findAll(),
            'categoriaSeleccionada' => $this->request->getGet('categoria'),
            'talleSeleccionado' => $this->request->getGet('talle')
        ]);
    }



    public function guardar()
    {
        if (!session()->get('logged_in') || session()->get('rol') !== 'admin') {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'nombre'       => 'required|min_length[3]',
            'categoria_id' => 'required|integer',
            'talle_id'     => 'required|integer',
            'descripcion'  => 'required',
            'precio'       => 'required|decimal',
            'foto'         => 'uploaded[foto]|mime_in[foto,image/jpeg,image/webp,image/avif]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads', $newName);

        $data = [
            'nombre'       => $this->request->getPost('nombre'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'talle_id'     => $this->request->getPost('talle_id'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'precio'       => $this->request->getPost('precio'),
            'foto'         => $newName,
            'activo'       => 1,
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

        $model = new \App\Models\ProductoModel();
        $producto = $model->find($id);

        if (!$producto) {
            return redirect()->to('productos/admin')->with('error', 'Producto no encontrado');
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        $talleModel = new \App\Models\TalleModel();

        return view('front/producto_edit', [
            'producto'   => $producto,
            'categorias' => $categoriaModel->findAll(),
            'talles'     => $talleModel->findAll(),
        ]);
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

        $validation = \Config\Services::validation();
        $rules = [
            'nombre'       => 'required|min_length[3]',
            'categoria_id' => 'required|integer',
            'talle_id'     => 'required|integer',
            'descripcion'  => 'required',
            'precio'       => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nombre'       => $this->request->getPost('nombre'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'talle_id'     => $this->request->getPost('talle_id'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'precio'       => $this->request->getPost('precio'),
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
