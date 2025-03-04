<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'featured_image', 'status', 'category'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

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


    /**
     * Ambil berita terbaru dengan status 'published'
     *
     * @param int $limit Jumlah berita yang ingin diambil
     * @return array
     */
    public function getLatestPublishedByCategory($limit = 3, $category = null)
    {
        return $this->select('posts.*')
            ->where('posts.status', 'published')
            ->where('posts.category', $category)
            ->orderBy('posts.created_at', 'DESC')
            ->limit($limit)
            ->find();
    }
}
