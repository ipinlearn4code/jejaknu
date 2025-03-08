<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>
<link rel="stylesheet" href="css/style4.css">
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kader</title>
</head>

<body>

    <?php $userRole = session()->get('role'); ?>

    <div class="header-kader">
    <h2 class="judul-daftar-kader">Daftar Kader</h2>
    <div class="tombol">
        <?php if ($userRole === 'superadmin'): ?>
            <a href="<?= base_url('daftarkader') ?>" class="btn btn-primary">Tambah Kader</a>
        <?php endif; ?>
    </div>
</div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
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
                                        <a href="<?= base_url('cadre/' . $k['id'] . '/edit') ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?= base_url('cadre/' . $k['id']) ?>" method="post" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
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
                            <td colspan="<?= ($userRole === 'superadmin') ? 6 : 4 ?>" class="text-center">Tidak ada data
                                kader.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<?= $this->include('layouts/footer') ?>
