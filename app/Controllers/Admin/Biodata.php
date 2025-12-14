<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BiodataModel;

class Biodata extends BaseController
{
    protected $biodataModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
    }

    public function index()
    {
        // Assuming single record for biodata
        $biodata = $this->biodataModel->first();
        if (!$biodata) {
            // Redirect to create if doesn't exist? Or just show empty.
             return redirect()->to('/admin/biodata/create');
        }

        $data = [
            'title' => 'Biodata Diri',
            'biodata' => $biodata
        ];
        
        // We reuse edit view or create a specific show view? 
        // Let's forward to edit since it's a single profile management usually.
        return redirect()->to('/admin/biodata/edit/' . $biodata['id']);
    }
    
    // Fallback if needed mostly for initial setup
    public function create()
    {
         if ($this->biodataModel->countAll() > 0) {
            return redirect()->to('/admin/biodata');
        }

        $data = [
            'title' => 'Isi Biodata',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/biodata/create', $data);
    }


    public function save()
    {
         // Prevent multiple biodata
        if ($this->biodataModel->countAll() > 0) {
            return redirect()->to('/admin/biodata');
        }

        if (!$this->validate($this->biodataModel->validationRules)) {
            return redirect()->to('/admin/biodata/create')->withInput();
        }

        $this->biodataModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'riwayat_singkat' => $this->request->getVar('riwayat_singkat'),
        ]);

        session()->setFlashdata('message', 'Biodata berhasil dibuat.');
        return redirect()->to('/admin/biodata');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Biodata',
            'validation' => \Config\Services::validation(),
            'biodata' => $this->biodataModel->find($id)
        ];
        return view('admin/biodata/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'nama'            => 'required',
            'email'           => 'required|valid_email',
            'no_hp'           => 'required',
            'alamat'          => 'required',
            'riwayat_singkat' => 'required',
            'foto'            => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/admin/biodata/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id'              => $id,
            'nama'            => $this->request->getPost('nama'),
            'email'           => $this->request->getPost('email'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat'),
            'riwayat_singkat' => $this->request->getPost('riwayat_singkat'),
            'link_github'     => $this->request->getPost('link_github'),
            'link_linkedin'   => $this->request->getPost('link_linkedin'),
            'link_instagram'  => $this->request->getPost('link_instagram'),
            'link_twitter'    => $this->request->getPost('link_twitter'),
        ];

        // Handle File Upload
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $newName = $fileFoto->getRandomName();
            $fileFoto->move(ROOTPATH . 'public/uploads/biodata', $newName);
            
            // Delete old photo logic could involve model fetch, simplified here for robustness
            $oldBiodata = $this->biodataModel->find($id);
            if ($oldBiodata && !empty($oldBiodata['foto']) && file_exists(ROOTPATH . 'public/uploads/biodata/' . $oldBiodata['foto'])) {
                unlink(ROOTPATH . 'public/uploads/biodata/' . $oldBiodata['foto']);
            }

            $data['foto'] = $newName;
        }

        $this->biodataModel->save($data);

        session()->setFlashdata('message', 'Biodata berhasil diperbarui.');
        return redirect()->to('/admin/biodata/edit/' . $id);
    }
}
