<?php

namespace App\Controllers;

use App\Models\AktivitasModel;
use App\Models\BiodataModel;
use App\Models\PendidikanModel;

class Home extends BaseController
{
    public function index()
    {
        $biodataModel   = new BiodataModel();

        $data = [
            'title'      => 'Curriculum Vitae',
            'biodata'    => $biodataModel->first(),
        ];

        return view('public/biodata', $data);
    }

    public function pendidikan()
    {
        $pendidikanModel = new PendidikanModel();
        
        $keyword = $this->request->getVar('keyword');
        $jenjang = $this->request->getVar('jenjang');
        $sort    = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'tahun_masuk';
        $order   = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC';

        if ($keyword) {
            $pendidikanModel->like('nama_sekolah', $keyword);
        }
        
        if ($jenjang) {
            $pendidikanModel->where('jenjang', $jenjang);
        }
        
        $pendidikanModel->orderBy($sort, $order);

        $data = [
            'title'      => 'Riwayat Pendidikan',
            'pendidikan' => $pendidikanModel->paginate(5, 'pendidikan'), // 5 items per page
            'pager'      => $pendidikanModel->pager,
            'keyword'    => $keyword,
            'jenjang'    => $jenjang,
            'sort'       => $sort,
            'order'      => $order
        ];

        return view('public/pendidikan', $data);
    }

    public function aktivitas()
    {
        $aktivitasModel = new AktivitasModel();

        $keyword = $this->request->getVar('keyword');
        $sort    = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'tanggal';
        $order   = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC';

        if ($keyword) {
            $aktivitasModel->groupStart()
                ->like('nama_aktivitas', $keyword)
                ->orLike('keterangan', $keyword)
                ->groupEnd();
        }

        $aktivitasModel->orderBy($sort, $order);

        $data = [
            'title'      => 'Aktivitas Harian',
            'aktivitas'  => $aktivitasModel->paginate(5, 'aktivitas'), // 5 items per page
            'pager'      => $aktivitasModel->pager,
            'keyword'    => $keyword,
            'sort'       => $sort,
            'order'      => $order
        ];

        return view('public/aktivitas', $data);
    }
}
