<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenjang', 'nama_sekolah', 'tahun_masuk', 'tahun_lulus'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'jenjang'      => 'required|in_list[SD,SMP,SMA,Kuliah]',
        'nama_sekolah' => 'required|min_length[3]|max_length[255]',
        'tahun_masuk'  => 'required|integer|min_length[4]',
        'tahun_lulus'  => 'required|integer|min_length[4]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
