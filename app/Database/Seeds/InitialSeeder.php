<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // Seed Aktivitas
        $dataAktivitas = [
            [
                'tanggal'        => '2023-10-01',
                'nama_aktivitas' => 'Belajar CodeIgniter 4',
                'keterangan'     => 'Mempelajari routing dan controller.',
                'created_at'     => Time::now(),
                'updated_at'     => Time::now(),
            ],
            [
                'tanggal'        => '2023-10-02',
                'nama_aktivitas' => 'Setup Database',
                'keterangan'     => 'Membuat migrasi dan seeder.',
                'created_at'     => Time::now(),
                'updated_at'     => Time::now(),
            ]
        ];
        $this->db->table('aktivitas')->insertBatch($dataAktivitas);

        // Seed Biodata
        $dataBiodata = [
            'nama'            => 'John Doe',
            'alamat'          => 'Jl. Merdeka No. 10, Jakarta',
            'email'           => 'johndoe@example.com',
            'no_hp'           => '081234567890',
            'riwayat_singkat' => 'Seorang pengembang web yang antusias dengan PHP dan JavaScript.',
            'created_at'      => Time::now(),
            'updated_at'      => Time::now(),
        ];
        // Ensure only one biodata for this simple app or insert one
        $this->db->table('biodata')->insert($dataBiodata);

        // Seed Pendidikan
        $dataPendidikan = [
            [
                'jenjang'      => 'SD',
                'nama_sekolah' => 'SDN 01 Jakarta',
                'tahun_masuk'  => 2005,
                'tahun_lulus'  => 2011,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'jenjang'      => 'SMP',
                'nama_sekolah' => 'SMPN 01 Jakarta',
                'tahun_masuk'  => 2011,
                'tahun_lulus'  => 2014,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'jenjang'      => 'SMA',
                'nama_sekolah' => 'SMAN 01 Jakarta',
                'tahun_masuk'  => 2014,
                'tahun_lulus'  => 2017,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
             [
                'jenjang'      => 'Kuliah',
                'nama_sekolah' => 'Universitas Indonesia',
                'tahun_masuk'  => 2017,
                'tahun_lulus'  => 2021,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ]
        ];
        $this->db->table('pendidikan')->insertBatch($dataPendidikan);
    }
}
