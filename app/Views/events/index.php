<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
    <p>
        <a href="<?= base_url('events/new') ?>" class="btn btn-primary">Buat Event Baru</a>
    </p>
<?php endif; ?>
<h2>Event Spesial</h2>
<ul>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specialEvents as $event): ?>
                <tr>
                    <td><?= esc($event['title']) ?></td>
                    <td><?= esc($event['description']) ?></td>
                    <td><?= esc($event['location']) ?></td>
                    <td><?= isset($event['event_date']) ? date('d M Y', strtotime($event['event_date'])) : 'Belum ditentukan' ?>
                    </td>
                    <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                        <td>
                            <a href="<?= base_url('events/' . $event['id'] . '/edit') ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('events/' . $event['id'] . '/delete') ?>" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</ul>

<h2>Event Rutin</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>Jadwal</th>
            <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recurringEvents as $event): ?>
            <tr>
                <td><?= esc($event['title']) ?></td>
                <td><?= esc($event['description']) ?></td>
                <td><?= esc($event['location']) ?></td>
                <td>
                    <ul>
                        <?php foreach ($event['schedules'] as $schedule): ?>
                            <li>
                                <?php if ($schedule['recurrence_type'] == 'mingguan'): ?>
                                    Tiap Minggu, Hari <?= esc($schedule['recurrence_day']) ?>
                                <?php elseif ($schedule['recurrence_type'] == 'bulanan'): ?>
                                    Tiap Bulan, Hari <?= esc($schedule['recurrence_day']) ?>
                                    Minggu <?= esc($schedule['recurrence_week']) ?>             
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </td>
                <?php if (session()->get('role') === 'admin' || session()->get('role') === 'superadmin'): ?>
                    <td>
                        <a href="<?= base_url('events/' . $event['id'] . '/edit') ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('events/' . $event['id'] . '/delete') ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('layouts/footer') ?>