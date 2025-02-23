<?php
 include(__DIR__ . '/../../../../layouts/header.php');
 include(__DIR__ . '/../../../../layouts/navbar2.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Event Rutin</title>
    
</head>
<body>
    
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Data Event Rutin</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('event/create') ?>" class="btn btn-success">Tambah Event</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped w-100">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID Event</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $events = [
                        ["id" => "1", "nama" => "Maulid Nabi", "tanggal" => "2025-03-12", "lokasi" => "Masjid An-Nur", "deskripsi" => "Peringatan Maulid Nabi Muhammad SAW"],
                        ["id" => "2", "nama" => "Hari Santri", "tanggal" => "2025-10-22", "lokasi" => "Pondok Pesantren Al-Hikmah", "deskripsi" => "Peringatan Hari Santri Nasional"],
                        ["id" => "3", "nama" => "Halaqah Kebangsaan", "tanggal" => "2025-06-15", "lokasi" => "Gedung PBNU", "deskripsi" => "Diskusi kebangsaan bersama ulama dan cendekiawan"]
                    ];
                    foreach ($events as $event): ?>
                    <tr>
                        <td class="text-center"><?= esc($event['id']) ?></td>
                        <td><?= esc($event['nama']) ?></td>
                        <td class="text-center"><?= esc($event['tanggal']) ?></td>
                        <td><?= esc($event['lokasi']) ?></td>
                        <td><?= esc($event['deskripsi']) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('event/edit/'.$event['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('event/delete/'.$event['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus event ini?')">Hapus</a>
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
