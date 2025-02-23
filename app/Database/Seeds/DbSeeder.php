<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DbSeeder extends Seeder
{

    public function run()
    {
        // 1. Seed Users
        $this->db->table('users')->insertBatch([
            [
                'username'      => 'superadmin',
                'email'         => 'superadmin@example.com',
                'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
                'role'          => 'superadmin',
            ],
            [
                'username'      => 'member1',
                'email'         => 'member1@example.com',
                'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
                'role'          => 'member',
            ],
        ]);

        // 2. Seed Categories
        $this->db->table('categories')->insertBatch([
            [
                'name' => 'News',
                'slug' => 'news',
            ],
            [
                'name' => 'Tutorials',
                'slug' => 'tutorials',
            ],
        ]);

        // 3. Seed Posts with Direct Image Paths
        // Assume that you've already placed the images in the 'public/uploads' directory:
        // For example, upload two images named 'cover1.jpg' and 'cover2.jpg'
        $this->db->table('posts')->insertBatch([
            [
                'title'          => 'Welcome to Our CMS',
                'slug'           => 'welcome-to-our-cms',
                'content'        => 'This is a sample post content. The featured image is stored at /uploads/cover1.jpg.',
                'user_id'        => 1, // superadmin
                'category_id'    => 1, // News
                'status'         => 'published',
                'featured_image' => '/uploads/cover1.jpg', // direct path to image in public/uploads
            ],
            [
                'title'          => 'Getting Started with CodeIgniter 4',
                'slug'           => 'getting-started-ci4',
                'content'        => 'Tutorial on how to start with CodeIgniter 4. The featured image is stored at /uploads/cover2.jpg.',
                'user_id'        => 1, // superadmin
                'category_id'    => 2, // Tutorials
                'status'         => 'draft',
                'featured_image' => '/uploads/cover2.jpg', // direct path to image in public/uploads
            ],
        ]);
    }
}
