<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="id">

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <?php if (!empty($post)): ?>
                        <?php
                        // Ambil gambar pertama dari content CKEditor
                        preg_match('/<img[^>]+src="([^"]+)"/i', $post['content'], $matches);
                        $imageSrc = $matches[1] ?? base_url('img/default.jpg'); // Gunakan default jika tidak ada gambar
                        ?>

                        <img src="<?= esc($imageSrc) ?>" class="card-img-top post-img"
                            alt="<?= esc($post['title'] ?? 'Gambar Tidak Tersedia'); ?>">

                        <div class="card-body">
                            <h2 class="card-title"><?= esc($post['title'] ?? 'Judul Tidak Tersedia'); ?></h2>
                            <p class="text-muted"><i class="bi bi-calendar-event"></i>
                                <?= esc($post['created_at'] ?? 'Tanggal Tidak Tersedia'); ?>
                            </p>

                            <div class="post-content">
                                <?= !empty($post['content']) ? strip_tags($post['content'], '<p><a><strong><em><ul><ol><li><br>') : '<p>Konten tidak tersedia.</p>'; ?>
                            </div>

                            <a href="<?= base_url('posts/' . ($post['category'] == 'news' ? 'news' : 'article')); ?>"
                                class="btn btn-secondary mt-4">Kembali
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="card-body text-center">
                            <h2 class="text-danger">Data Tidak Ditemukan</h2>
                            <p>Maaf, data yang Anda cari tidak tersedia atau telah dihapus.</p>
                            <a href="<?= base_url('/news'); ?>" class="btn btn-secondary mt-4">Kembali</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('layouts/footer') ?>
