<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card event-card shadow-sm border-0">
                <?php
                // Ambil gambar pertama dari content
                preg_match('/<img.*?src=["\'](.*?)["\']/', $post['content'], $matches);
                $thumbnail = $matches[1] ?? null;
                ?>
                <link rel="stylesheet" href="css/style4.css">

                <img src="<?= $thumbnail ?: base_url('default-thumbnail.jpg') ?>" class="event-img"
                    alt="<?= esc($post['title']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($post['title']); ?></h5>
                    <p class="card-text text-muted"><i class="bi bi-calendar-event"></i>
                        <?= esc($post['created_at']); ?></p>

                    <p class="card-text"><?= word_limiter(strip_tags($post['content']), 20) ?></p>

                    <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                        <p class="card-text">Status <?= esc($post['category']); ?>: <?= esc($post['status']); ?></p>
                    <?php endif; ?>

                    <a href="<?= base_url('posts/' . $post['id']); ?>" class="btn btn-primary">Detail</a>
                    <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                        <a href="javascript:void(0);" class="btn btn-primary btn-action" data-id="<?= $post['id']; ?>"
                            data-status="<?= $post['status']; ?>">
                            <?= $post['status'] === 'published' ? 'Arsipkan' : 'Publikasikan'; ?>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-action" data-id="<?= $post['id']; ?>"
                            data-status="<?= $post['status']; ?>"
                            onclick="if (confirm('Anda yakin ingin menghapus post ini?')) { deletePost(<?= $post['id']; ?>); return true; } else { return false; }">
                            Hapus
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function deletePost(id) {
        $.ajax({
            url: '<?= base_url('posts') ?>/' + id,
            type: 'DELETE',
            success: function () {
                reloadPosts(); // Reload hanya daftar post
            },
            error: function () {
                alert('Gagal menghapus post.');
            }
        });
    }

    function reloadPosts() {
        $.ajax({
            url: '<?= base_url('posts/reload') ?>',
            type: 'GET',
            success: function (data) {
                $('#posts-container').html(data); // Update hanya bagian daftar post
            }
        });
    }
</script>
