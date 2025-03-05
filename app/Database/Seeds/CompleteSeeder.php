<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompleteSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['id' => 1, 'username' => 'superadmin', 'email' => 'superadmin@example.com', 'password_hash' => password_hash('supersecure', PASSWORD_BCRYPT), 'role' => 'superadmin', 'avatar' => NULL, 'created_at' => '0000-00-00 00:00:00', 'updated_at' => '0000-00-00 00:00:00'],
            ['id' => 2, 'username' => 'admin', 'email' => 'admin@example.com', 'password_hash' => password_hash('admin123', PASSWORD_BCRYPT), 'role' => 'admin', 'avatar' => NULL, 'created_at' => '2025-03-03 02:30:45', 'updated_at' => '2025-03-03 02:30:45'],
            ['id' => 3, 'username' => 'alfredrjy_', 'email' => 'alg@gmail.com', 'password_hash' => password_hash('password123', PASSWORD_BCRYPT), 'role' => 'member', 'avatar' => NULL, 'created_at' => '2025-03-03 02:30:45', 'updated_at' => '2025-03-03 02:30:45'],
        ];
        $this->db->table('users')->insertBatch($users);
        // Seeder untuk cadre_profiles
        $cadreProfiles = [
            [
                'id' => 1,
                'user_id' => 3,
                'nik' => '2252135135121',
                'name' => 'alfred wijaya',
                'address' => 'Gandaria, Blok C10 NO 12',
                'education' => 'sma',
                'skills' => 'Kuli Coding',
                'created_at' => '2025-03-03 02:30:45',
                'updated_at' => '2025-03-03 02:30:45',
            ]
        ];
        $this->db->table('cadre_profiles')->insertBatch($cadreProfiles);

        // Seeder untuk events
        $events = [
            ['id' => 1, 'title' => 'asndakjsd', 'description' => 'saas', 'location' => 'asas', 'event_type' => 'special', 'created_at' => '2025-03-05 07:28:24'],
            ['id' => 2, 'title' => 'Ngabuburit', 'description' => 'Ululululu', 'location' => 'Alun Alun Malang', 'event_type' => 'special', 'created_at' => '2025-03-05 07:41:59'],
            ['id' => 3, 'title' => 'Rutinan1', 'description' => 'jjjj', 'location' => 'Masjid Baitushoffa', 'event_type' => 'recurring', 'created_at' => '2025-03-05 07:42:42'],
        ];
        $this->db->table('events')->insertBatch($events);

        // Seeder untuk event_schedules
        $eventSchedules = [
            ['id' => 1, 'event_id' => 1, 'event_date' => '2025-03-10', 'recurrence_type' => NULL, 'recurrence_day' => NULL, 'recurrence_week' => NULL],
            ['id' => 2, 'event_id' => 2, 'event_date' => '2025-03-06', 'recurrence_type' => NULL, 'recurrence_day' => NULL, 'recurrence_week' => NULL],
            ['id' => 3, 'event_id' => 3, 'event_date' => NULL, 'recurrence_type' => 'bulanan', 'recurrence_day' => 'Senin', 'recurrence_week' => 'Keempat'],
        ];
        $this->db->table('event_schedules')->insertBatch($eventSchedules);

        // Seeder untuk messages
        $messages = [
            ['id' => 1, 'user_id' => 2, 'message' => 'Halo Semua', 'audio_url' => NULL, 'created_at' => '2025-03-04 23:00:10', 'updated_at' => '2025-03-04 23:00:10'],
            ['id' => 2, 'user_id' => 3, 'message' => 'Bismillah Ramadhan Lancar', 'audio_url' => NULL, 'created_at' => '2025-03-04 23:19:10', 'updated_at' => '2025-03-04 23:19:10'],
        ];
        $this->db->table('messages')->insertBatch($messages);

        // Seeder untuk posts
        $posts = [
            ['id' => 1, 'title' => 'Mengawal Tradisi, Menjaga NKRI', 'content' => '<p>Didirikan pada 31 Januari 1926, Nahdlatul Ulama (NU) hadir sebagai wadah perjuangan ulama dan santri dalam menjaga ajaran Islam Ahlussunnah wal Jama’ah serta keutuhan bangsa. Berkomitmen pada nilai-nilai moderasi, NU terus berkontribusi dalam membangun umat dan negara.<img src="https://mediaindonesia.gumlet.io/news/2024/01/71b8cb46cbc8b19d6218f8cfc3820d6f.jpg?w=376&amp;dpr=2.6" alt="Biografi KH Hasyim Asyari, Tokoh Pendiri NU" width="977" height="570"></p>', 'user_id' => 0, 'category' => 'article', 'status' => 'published', 'featured_image' => NULL, 'created_at' => '2025-03-04 19:15:06', 'updated_at' => '2025-03-04 19:15:15'],
            ['id' => 2, 'title' => 'NU di Era Digital: Merajut Ukhuwah di Dunia Maya', 'content' => '<p>Dalam menghadapi tantangan zaman, NU terus beradaptasi dengan perkembangan teknologi. Melalui platform digital, dakwah dan informasi Islam moderat dapat menjangkau lebih banyak umat. Bergabunglah dengan komunitas digital NU!</p><figure class="image"><img style="aspect-ratio:275/183;" src="http://localhost:8080/uploads/imgpost/1741117795_2e06e2d5f39d05414244.jpeg" alt="NU dan Revolusi Digital – NU Online LTN Nahdlatul Ulama Jawa Barat" width="275" height="183"></figure>', 'user_id' => 2, 'category' => 'article', 'status' => 'published', 'featured_image' => NULL, 'created_at' => '2025-03-04 19:15:06', 'updated_at' => '2025-03-04 19:15:15'],
            ['id' => 3, 'title' => 'Bersama NU, Mengabdi untuk Negeri', 'content' => '<p>NU aktif dalam berbagai program sosial, pendidikan, dan dakwah. Dari pengembangan pesantren, layanan kesehatan, hingga advokasi kesejahteraan umat, NU terus berupaya membangun masyarakat yang mandiri dan sejahtera.</p><figure class="image"><img style="aspect-ratio:5120/2880;" src="http://localhost:8080/uploads/imgpost/1741117960_d4e8bcd2b9d0c8cbb55e.jpg" width="5120" height="2880"></figure><p>&nbsp;</p>', 'user_id' => 2, 'category' => 'article', 'status' => 'published', 'featured_image' => NULL, 'created_at' => '2025-03-04 19:15:06', 'updated_at' => '2025-03-04 19:15:15'],
        ];
        $this->db->table('posts')->insertBatch($posts);

    }
}
