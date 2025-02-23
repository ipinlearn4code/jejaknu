<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar2') ?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kader</title>

</head>

<body>

    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Data Kader</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('daftarkader') ?>" class="btn btn-primary">Tambah Kader</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped w-100">
                <thead class="table-dark">
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Lulusan</th>
                        <th>Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Cadres) && count($Cadres) > 0): ?>
                        <?php foreach ($Cadres as $k): ?>
                            <tr>
                                <td><?= esc($k['nik']) ?></td>
                                <td><?= esc($k['name']) ?></td>
                                <td><?= esc($k['address']) ?></td>
                                <td><?= esc($k['education']) ?></td>
                                <td><?= esc($k['skills']) ?></td>
                                <td>
                                    <a href="<?= base_url('cadre/' . $k['id'] . '/edit') ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?= base_url('cadre/' . $k['id']) ?>" method="post"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data kader.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>

<?= $this->include('layouts/footer') ?>