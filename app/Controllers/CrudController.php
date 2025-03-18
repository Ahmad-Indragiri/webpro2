<?php

namespace App\Controllers;

use App\Models\M_Crud;
use CodeIgniter\Controller;

class CrudController extends Controller
{
    public function index()
    {
        $model = new M_Crud();
        $data['users'] = $model->getUsers();
        return view('crud/index', $data);
    }

    public function create()
    {
        return view('crud/create');
    }

    public function store()
    {
        $model = new M_Crud();
        $model->insert([
            'nama'     => $this->request->getPost('nama'),
            'alamat'   => $this->request->getPost('alamat'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ]);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $model = new M_Crud();
        $data['user'] = $model->find($id);
        return view('crud/edit', $data);
    }

    public function update($id)
    {
        $model = new M_Crud();
        $model->update($id, [
            'nama'     => $this->request->getPost('nama'),
            'alamat'   => $this->request->getPost('alamat'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ]);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $model = new M_Crud();
        $model->delete($id);
        return redirect()->to('/');
    }
}
