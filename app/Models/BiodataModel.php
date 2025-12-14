<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 'biodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'alamat', 'email', 'no_hp', 'riwayat_singkat', 'foto', 'link_github', 'link_linkedin', 'link_instagram', 'link_twitter'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'nama'            => 'required|min_length[3]|max_length[100]',
        'email'           => 'required|valid_email|max_length[100]',
        'no_hp'           => 'required|min_length[10]|max_length[20]',
        'alamat'          => 'required',
        'riwayat_singkat' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
