<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    // Allowed fields for insert/update
    protected $allowedFields = [
        'username',
        'email',
        'password_hash',
        'role',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true; 
    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    protected $validationRules = [
        'username' => 'required|is_unique[users.username]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password_hash' => 'required|min_length[8]'
    ];
    
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Username sudah digunakan!'
        ],
        'email' => [
            'is_unique' => 'Email sudah terdaftar!'
        ],
        'password_hash' => [
            'min_length' => 'Password minimal 8 karakter!'
        ]
    ];
    
}
