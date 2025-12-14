<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendidikanModel;

class Pendidikan extends BaseController
{
    protected $pendidikanModel;

    public function __construct()
    {
        $this->pendidikanModel = new PendidikanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat Pendidikan',
            'pendidikan' => $this->pendidikanModel->orderBy('tahun_masuk', 'DESC')->findAll()
        ];
        return view('admin/pendidikan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pendidikan',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/pendidikan/create', $data);
    }

    public function save()
    {
        if (!$this->validate($this->pendidikanModel->validationRules)) {
            return redirect()->to('/admin/pendidikan/create')->withInput();
        }

        $this->pendidikanModel->save([
            'jenjang' => $this->request->getVar('jenjang'),
            'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            'tahun_masuk' => $this->request->getVar('tahun_masuk'),
            'tahun_lulus' => $this->request->getVar('tahun_lulus'),
        ]);

        session()->setFlashdata('message', 'Data pendidikan berhasil ditambahkan.');
        return redirect()->to('/admin/pendidikan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pendidikan',
            'validation' => \Config\Services::validation(),
            'pendidikan' => $this->pendidikanModel->find($id)
        ];
        return view('admin/pendidikan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->pendidikanModel->validationRules)) {
            return redirect()->to('/admin/pendidikan/edit/' . $id)->withInput();
        }

        $this->pendidikanModel->save([
            'id' => $id,
            'jenjang' => $this->request->getVar('jenjang'),
            'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            'tahun_masuk' => $this->request->getVar('tahun_masuk'),
            'tahun_lulus' => $this->request->getVar('tahun_lulus'),
        ]);

        session()->setFlashdata('message', 'Data pendidikan berhasil diubah.');
        return redirect()->to('/admin/pendidikan');
    }

    public function delete($id)
    {
        $this->pendidikanModel->delete($id);
        session()->setFlashdata('message', 'Data pendidikan berhasil dihapus.');
        return redirect()->to('/admin/pendidikan');
    }
}
