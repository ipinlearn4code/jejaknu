<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'events';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'date', 'location', 'description', 'user_id'];
    protected $useTimestamps    = true;
    // If you want to update created_at/updated_at automatically, ensure your fields match your migration
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    // Optionally, you can add validation rules here:
    protected $validationRules    = [
        'name'        => 'required|max_length[255]',
        'event_category' => 'required|in_list[Rutin,Spesial]',
        'date'        => 'required|valid_date',
        'location'    => 'required|max_length[255]',
        'description' => 'permit_empty',
        'user_id'     => 'required|numeric'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
