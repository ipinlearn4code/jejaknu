<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>


<h2 class="event-title"><?= isset($event) ? 'Edit Event' : 'Buat Event Baru' ?></h2>
<link rel="stylesheet" href="<?= base_url('css/style5.css') ?>">
<form method="post" action="<?= isset($event) ? base_url('events/' . $event['id'] . '/update') : base_url('events/') ?>">
    <input type="hidden" name="_method" value="<?= isset($event) ? 'PUT' : 'POST' ?>">

    <label>Judul Event</label>
    <input type="text" name="title" value="<?= isset($event) ? esc($event['title']) : '' ?>" required>

    <label>Deskripsi</label>
    <textarea name="description"><?= isset($event) ? esc($event['description']) : '' ?></textarea>

    <label>Lokasi</label>
    <input type="text" name="location" value="<?= isset($event) ? esc($event['location']) : '' ?>">

    <label>Tipe Event</label>
    <select name="event_type" id="eventType" onchange="toggleEventFields()">
        <option value="special" <?= isset($event) && $event['event_type'] === 'special' ? 'selected' : '' ?>>Spesial</option>
        <option value="recurring" <?= isset($event) && $event['event_type'] === 'recurring' ? 'selected' : '' ?>>Rutin</option>
    </select>

    <!-- Untuk Event Spesial -->
    <div id="specialEventFields" style="display: <?= isset($event) && $event['event_type'] === 'special' ? 'block' : 'none' ?>;">
        <label>Tanggal Event</label>
        <input type="date" name="event_date" value="<?= isset($eventSchedule) && isset($eventSchedule['event_date']) ? esc($eventSchedule['event_date']) : '' ?>">
    </div>

    <!-- Untuk Event Rutin -->
    <div id="recurringEventFields" style="display: <?= isset($event) && $event['event_type'] === 'recurring' ? 'block' : 'none' ?>;">
        <label>Jenis Rutin</label>
        <select name="recurrence_type" id="recurrenceType" onchange="toggleRecurrenceFields()">
            <option value="Mingguan" <?= isset($eventSchedule) && $eventSchedule['recurrence_type'] === 'Mingguan' ? 'selected' : '' ?>>Mingguan</option>
            <option value="Bulanan" <?= isset($eventSchedule) && $eventSchedule['recurrence_type'] === 'Bulanan' ? 'selected' : '' ?>>Bulanan</option>
        </select>

        <label>Hari</label>
        <select name="recurrence_day">
            <?php
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            foreach ($days as $day) :
            ?>
                <option value="<?= $day ?>" <?= isset($eventSchedule) && $eventSchedule['recurrence_day'] === $day ? 'selected' : '' ?>><?= $day ?></option>
            <?php endforeach; ?>
        </select>

        <div id="monthlyFields" style="display: <?= isset($eventSchedule) && $eventSchedule['recurrence_type'] === 'Bulanan' ? 'block' : 'none' ?>;">
            <label>Minggu ke-</label>
            <select name="recurrence_week">
                <?php
                $weeks = ['Pertama', 'Kedua', 'Ketiga', 'Keempat'];
                foreach ($weeks as $week) :
                ?>
                    <option value="<?= $week ?>" <?= isset($eventSchedule) && $eventSchedule['recurrence_week'] === $week ? 'selected' : '' ?>><?= $week ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <button type="submit"><?= isset($event) ? 'Perbarui' : 'Simpan' ?></button>
</form>

<script>
    function toggleEventFields() {
        let type = document.getElementById('eventType').value;
        document.getElementById('specialEventFields').style.display = type === 'special' ? 'block' : 'none';
        document.getElementById('recurringEventFields').style.display = type === 'recurring' ? 'block' : 'none';
    }

    function toggleRecurrenceFields() {
        let recurrenceType = document.getElementById('recurrenceType').value;
        document.getElementById('monthlyFields').style.display = recurrenceType === 'Bulanan' ? 'block' : 'none';
    }

    // Jalankan saat halaman dimuat untuk memastikan tampilan sesuai dengan data yang ada
    document.addEventListener("DOMContentLoaded", function () {
        toggleEventFields();
        toggleRecurrenceFields();
    });
</script>

<?= $this->include('layouts/footer') ?>
