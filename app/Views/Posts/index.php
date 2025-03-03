<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">News</h2>
    <p class="text-center text-muted">Kegiatan yang berlangsung secara berkala seperti pengajian, pelatihan, atau
        pertemuan kader.</p>

    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card event-card shadow-sm border-0">
                    <img src="<?= esc($post['featured_image']) ?>" class="event-img" alt="<?= $post['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($post['title']); ?></h5>
                        <p class="card-text text-muted"><i class="bi bi-calendar-event"></i>
                            <?= esc($post['created_at']); ?></p>

                        <p class="card-text"><?= esc(word_limiter($post['content'], 20)) ?></p>
                        <p class="card-text">Status <?= esc($post['category']); ?>: <?= esc($post['status']); ?></p>
                        
                        <a href="<?= base_url($post['id']); ?>" class="btn btn-primary">Detail</a>
                        <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                            <?php if ($post['status'] === 'archived'): ?>
                                <a href="<?= base_url('post/edit/' . $post['id']); ?>" class="btn btn-primary">Publikasikan</a>
                            <?php elseif ($post['status'] === 'published'): ?>
                                <a href="<?= base_url('post/edit/' . $post['id']); ?>" class="btn btn-primary">Arsipkan</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .event-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 15px;
        overflow: hidden;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .event-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .btn-primary {
        border-radius: 25px;
        padding: 8px 20px;
    }

    .text-muted {
        font-size: 0.9rem;
    }
</style>

<?= $this->include('layouts/footer'); ?>