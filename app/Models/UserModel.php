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

    // Automatically manage created_at and updated_at
    protected $useTimestamps = false; 
    // or set to true if you want CI4 to manage them automatically
    // then define the fields as below:
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    /**
     * Optionally, you can add methods for user-specific logic,
     * such as finding a user by email, etc.
     */
    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}
