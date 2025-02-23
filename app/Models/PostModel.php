<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'content', 'featured_image', 'status', 'created_at'];

    /**
     * Ambil postingan terbaru dengan status 'published'
     *
     * @param int $limit Jumlah postingan yang ingin diambil
     * @return array
     */
    public function getLatestPublishedPosts($limit = 3)
    {
        return $this->where('status', 'published')
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->find();
    }
}
