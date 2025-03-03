<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>
<!DOCTYPE html>
<html lang="id">

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <?php if (!empty($post['featured_image'])): ?>
                        <img src="<?= esc($post['featured_image']) ?>" class="card-img-top post-img"
                            alt="<?= esc($post['title']); ?>">
                    <?php endif; ?>

                    <div class="card-body">
                        <h2 class="card-title"><?= esc($post['title']); ?></h2>
                        <p class="text-muted"><i class="bi bi-calendar-event"></i> <?= esc($post['created_at']); ?></p>

                        <div class="post-content">
                            <?= $post['content']; // Biarkan tanpa esc() agar format HTML tetap terlihat ?>
                        </div>

                        <a href="<?= base_url('/news'); ?>" class="btn btn-secondary mt-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




<!-- <style>
    .post-img {
        height: 400px;
        object-fit: cover;
    }

    .post-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }
</style> -->

<?= $this->include('layouts/footer') ?>