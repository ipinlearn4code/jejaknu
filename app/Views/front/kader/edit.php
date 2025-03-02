<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kader</title>
    
    <!-- Pemanggilan CSS dengan base_url() -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <?php $userRole = session()->get('role'); ?>

    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Daftar Kader</h2>
        <div class="d-flex justify-content-end mb-3">
            <?php if ($userRole === 'superadmin'): ?>
                <a href="<?= base_url('daftarkader') ?>" class="btn btn-primary">Tambah Kader</a>
            <?php endif; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped w-100">
                <thead class="table-dark">
                    <tr>
                        <?php if ($userRole === 'superadmin'): ?>
                            <th>NIK</th>
                        <?php endif; ?>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Lulusan</th>
                        <th>Keahlian</th>
                        <?php if ($userRole === 'superadmin'): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Cadres) && count($Cadres) > 0): ?>
                        <?php foreach ($Cadres as $k): ?>
                            <tr>
                                <?php if ($userRole === 'superadmin'): ?>
                                    <td><?= esc($k['nik']) ?></td>
                                <?php endif; ?>
                                <td><?= esc($k['name']) ?></td>
                                <td><?= esc($k['address']) ?></td>
                                <td><?= esc($k['education']) ?></td>
                                <td><?= esc($k['skills']) ?></td>
                                <?php if ($userRole === 'superadmin'): ?>
                                    <td>
                                        <a href="<?= base_url('cadre/' . $k['id'] . '/edit') ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?= base_url('cadre/' . $k['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= ($userRole === 'superadmin') ? 6 : 4 ?>" class="text-center">Tidak ada data kader.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pastikan Bootstrap JS juga dimuat jika menggunakan komponen Bootstrap yang memerlukan JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>



<style>
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    /* Container dengan background gambar */
    .bg-container {
        position: relative;
        background-image: url('/img/bg3.png');
        /* Ganti dengan path gambar */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Overlay untuk efek transparan */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Warna hitam transparan */
        z-index: 1;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    /* Efek pada form */

    /* Efek pada form */
    .card {
        background: rgba(255, 255, 255, 0.9);
        /* Card semi transparan */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .input-custom {
        border: 2px solid #dee2e6;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .input-custom:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    .btn-primary {
        transition: all 0.3s ease-in-out;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }
</style>

<?= $this->include('layouts/footer') ?>
