<?php

namespace App\Models;

use CodeIgniter\Model;

class CadreProfileModel extends Model
{
    protected $table            = 'cadre_profiles';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'nik', 
        'user_id', 
        'name', 
        'address',
        'education', 
        'skills'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nik' => 'required|is_unique[cadre_profiles.nik]'
    ];
    
    protected $validationMessages = [
        'nik' => [
            'is_unique' => 'NIK sudah digunakan!'
        ]
    ];
    
}
