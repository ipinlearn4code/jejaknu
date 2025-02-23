<?php
 include(__DIR__ . '/../../../../layouts/header.php');
 include(__DIR__ . '/../../../../layouts/navbar2.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Nahdlatul Ulama</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Manajemen Artikel NU</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('articles/create') ?>" class="btn btn-primary">Tambah Artikel</a>
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
                    $articles = [
                        ["id" => 1, "judul" => "Peran Ulama dalam Pendidikan Islam", "tanggal" => "2025-02-20", "penulis" => "KH. Said Aqil", "kategori" => "Keagamaan", "status" => "Published"],
                        ["id" => 2, "judul" => "Mengenal Tradisi Keilmuan Pesantren", "tanggal" => "2025-02-18", "penulis" => "KH. Mustofa Bisri", "kategori" => "Pendidikan", "status" => "Draft"],
                        ["id" => 3, "judul" => "Islam Nusantara: Moderasi dan Kebudayaan", "tanggal" => "2025-02-15", "penulis" => "KH. Yahya Cholil", "kategori" => "Budaya", "status" => "Published"]
                    ];
                    foreach ($articles as $a): ?>
                    <tr>
                        <td><?= esc($a['id']) ?></td>
                        <td><?= esc($a['judul']) ?></td>
                        <td><?= esc($a['tanggal']) ?></td>
                        <td><?= esc($a['penulis']) ?></td>
                        <td><?= esc($a['kategori']) ?></td>
                        <td>
                            <span class="badge <?= $a['status'] == 'Published' ? 'bg-success' : 'bg-secondary' ?>">
                                <?= esc($a['status']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('articles/edit/'.$a['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('articles/delete/'.$a['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
