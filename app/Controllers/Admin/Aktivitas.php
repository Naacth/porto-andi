<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AktivitasModel;

class Aktivitas extends BaseController
{
    protected $aktivitasModel;

    public function __construct()
    {
        $this->aktivitasModel = new AktivitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Aktivitas',
            'aktivitas' => $this->aktivitasModel->findAll()
        ];
        return view('admin/aktivitas/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Aktivitas',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/aktivitas/create', $data);
    }

    public function save()
    {
        if (!$this->validate($this->aktivitasModel->validationRules)) {
            return redirect()->to('/admin/aktivitas/create')->withInput();
        }

        $this->aktivitasModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_aktivitas' => $this->request->getVar('nama_aktivitas'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('message', 'Data aktivitas berhasil ditambahkan.');
        return redirect()->to('/admin/aktivitas');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Aktivitas',
            'validation' => \Config\Services::validation(),
            'aktivitas' => $this->aktivitasModel->find($id)
        ];
        return view('admin/aktivitas/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->aktivitasModel->validationRules)) {
            return redirect()->to('/admin/aktivitas/edit/' . $id)->withInput();
        }

        $this->aktivitasModel->save([
            'id' => $id,
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_aktivitas' => $this->request->getVar('nama_aktivitas'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('message', 'Data aktivitas berhasil diubah.');
        return redirect()->to('/admin/aktivitas');
    }

    public function delete($id)
    {
        $this->aktivitasModel->delete($id);
        session()->setFlashdata('message', 'Data aktivitas berhasil dihapus.');
        return redirect()->to('/admin/aktivitas');
    }
}
