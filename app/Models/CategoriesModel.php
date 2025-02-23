<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false; 
    // Or set to true if you'd like CI4 to manage timestamps automatically:
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    /**
     * Example custom method: find category by slug
     */
    public function findBySlug(string $slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
