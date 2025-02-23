<?php

namespace App\Controllers;

use App\Models\CadreProfileModel;
use CodeIgniter\Controller;

class CadreProfileController extends Controller
{
    protected $cadreProfileModel;
    public function __construct()
    {
        $this->cadreProfileModel = new CadreProfileModel();
    }


    public function index()
    {
        $data['Cadres'] = $this->cadreProfileModel->findAll();
        return view('front/kader/index', $data);
    }

    public function new()
    {
        return view('front/kader/create');
    }


    public function create()
    {
        $rules = [
            'nik' => 'required',
            'name' => 'required',
            'address' => 'required',
            'education' => 'required',
            'skill' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nik' => $this->request->getPost('nik'),
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'education' => $this->request->getPost('education'),
            'skills' => $this->request->getPost('skill'),
        ];

        $this->cadreProfileModel->insert($data);

        return redirect()->to('cadre');
    }

    /**
     * Display the specified resource.
     * GET /kader/(:num)
     */
    // public function show($id = null)
    // {
    //     $kader = $this->cadreProfileModel->find($id);

    //     if (!$kader) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data with ID $id not found.");
    //     }
        
    //     $data['kader'] = $kader;
    //     return view('kader/show', $data);
    // }

    /**
     * Show the form for editing the specified resource.
     * GET /kader/(:num)/edit
     */
    public function edit($id = null)
    {
        $kader = $this->cadreProfileModel->find($id);

        if (!$kader) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data with ID $id not found.");
        }

        $data['kader'] = $kader;
        return view('front/kader/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * POST or PUT /kader/(:num)
     */
    public function update($id = null)
    {
        $kader = $this->cadreProfileModel->find($id);
        if (!$kader) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data with ID $id not found.");
        }

        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'lulusan' => $this->request->getPost('lulusan'),
            'keahlian' => $this->request->getPost('keahlian'),
        ];

        $this->cadreProfileModel->update($id, $data);

        return redirect()->to('/kader')->with('message', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * GET or POST /kader/(:num)/delete
     */
    public function delete($id = null)
    {
        $kader = $this->cadreProfileModel->find($id);
        if (!$kader) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data with ID $id not found.");
        }

        $this->cadreProfileModel->delete($id);

        return redirect()->to('cadre')->with('message', 'Data berhasil dihapus!');
    }
}
