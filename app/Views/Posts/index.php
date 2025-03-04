<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4"><?= $title ?? 'News'; ?></h2>
    <p class="text-center text-muted">Kegiatan yang berlangsung secara berkala seperti pengajian, pelatihan, atau
        pertemuan kader.</p>

    <div id="posts-container">
        <?= view('posts/list', ['posts' => $posts]); ?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-action').click(function () {
            let postId = $(this).data('id');
            let currentStatus = $(this).data('status');
            let newStatus = (currentStatus === 'draft' || currentStatus === 'archived') ? 'publish' : 'archive';

            $.ajax({
                url: '<?= base_url('post/') ?>' + newStatus + '/' + postId,
                type: 'GET',
                success: function () {
                    reloadPosts(); // Reload hanya daftar post
                },
                error: function () {
                    alert('Gagal memperbarui status post.');
                }
            });
        });

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
    });
</script>

<?= $this->include('layouts/footer'); ?>