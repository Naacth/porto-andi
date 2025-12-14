<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $aktivitasModel = new \App\Models\AktivitasModel();
        $pendidikanModel = new \App\Models\PendidikanModel();
        $biodataModel = new \App\Models\BiodataModel();

        $data = [
            'title' => 'Dashboard',
            'count_aktivitas' => $aktivitasModel->countAll(),
            'count_pendidikan' => $pendidikanModel->countAll(),
            'has_biodata' => $biodataModel->countAll() > 0
        ];
        
        return view('admin/dashboard', $data);
    }
}
