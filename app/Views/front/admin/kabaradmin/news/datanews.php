<?php
 include(__DIR__ . '/../../../../layouts/header.php');
 include(__DIR__ . '/../../../../layouts/navbar2.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Nahdlatul Ulama</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Manajemen Berita NU</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('news/create') ?>" class="btn btn-primary">Tambah Berita</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped w-100">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Tanggal Publikasi</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $news = [
                        ["id" => 1, "judul" => "Halaqah Fiqih Kebangsaan", "tanggal" => "2025-02-20", "penulis" => "KH. Ma'ruf Amin", "kategori" => "Keagamaan", "status" => "Published"],
                        ["id" => 2, "judul" => "NU Peduli Palestina", "tanggal" => "2025-02-18", "penulis" => "PBNU", "kategori" => "Sosial", "status" => "Draft"],
                        ["id" => 3, "judul" => "Santri Berdaya, Bangsa Berjaya", "tanggal" => "2025-02-15", "penulis" => "KH. Yahya Cholil", "kategori" => "Pendidikan", "status" => "Published"]
                    ];
                    foreach ($news as $n): ?>
                    <tr>
                        <td><?= esc($n['id']) ?></td>
                        <td><?= esc($n['judul']) ?></td>
                        <td><?= esc($n['tanggal']) ?></td>
                        <td><?= esc($n['penulis']) ?></td>
                        <td><?= esc($n['kategori']) ?></td>
                        <td>
                            <span class="badge <?= $n['status'] == 'Published' ? 'bg-success' : 'bg-secondary' ?>">
                                <?= esc($n['status']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('news/edit/'.$n['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('news/delete/'.$n['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include(__DIR__ . '/../../../../layouts/footer.php');
?>
