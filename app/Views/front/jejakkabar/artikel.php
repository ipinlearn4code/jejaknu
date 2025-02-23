<?php
include(__DIR__ . '/../../layouts/header.php');
include(__DIR__ . '/../../layouts/navbar.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Artikel</h2>
    <p class="text-center text-muted">Kegiatan yang berlangsung secara berkala seperti pengajian, pelatihan, atau pertemuan kader.</p>

    <div class="row">
        <?php 
        // Data event sementara (bisa diganti dengan database)
        $events = [
            ["title" => "Kajian Mingguan", "desc" => "Kajian Islam rutin yang membahas berbagai tema keagamaan.", "img" => "kajian.jpg", "date" => "Setiap Jumat", "link" => base_url('/event/rutin/kajian')],
            ["title" => "Pelatihan Kepemimpinan", "desc" => "Pelatihan bagi kader muda untuk mengembangkan jiwa kepemimpinan.", "img" => "pelatihan.jpg", "date" => "Setiap Bulan", "link" => base_url('/event/rutin/kepemimpinan')],
            ["title" => "Latihan Baris-Berbaris", "desc" => "Latihan rutin untuk meningkatkan disiplin dan kebersamaan.", "img" => "baris.jpg", "date" => "Setiap Sabtu", "link" => base_url('/event/rutin/lbb')],
            ["title" => "Diskusi Pemuda", "desc" => "Forum diskusi rutin tentang isu sosial dan kebangsaan.", "img" => "diskusi.jpg", "date" => "Setiap Rabu", "link" => base_url('/event/rutin/diskusi')],
            ["title" => "Bakti Sosial", "desc" => "Kegiatan sosial seperti berbagi makanan dan bantuan kepada yang membutuhkan.", "img" => "bakti.jpg", "date" => "Setiap Akhir Pekan", "link" => base_url('/event/rutin/baksos')],
            ["title" => "Olahraga Bersama", "desc" => "Kegiatan olahraga rutin untuk menjaga kebugaran kader.", "img" => "olahraga.jpg", "date" => "Setiap Minggu Pagi", "link" => base_url('/event/rutin/olahraga')]
        ];
        ?>

        <?php foreach ($events as $event) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card event-card shadow-sm border-0">
                <img src="<?php echo base_url('assets/img/' . $event['img']); ?>" class="card-img-top event-img" alt="<?= $event['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $event['title']; ?></h5>
                    <p class="card-text text-muted"><i class="bi bi-calendar-event"></i> <?= $event['date']; ?></p>
                    <p class="card-text"><?= $event['desc']; ?></p>
                    <a href="<?= $event['link']; ?>" class="btn btn-primary">Detail Event</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    /* Efek smooth dan tampilan profesional */
    .event-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 15px;
        overflow: hidden;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .event-img {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .btn-primary {
        border-radius: 25px;
        padding: 8px 20px;
    }

    .text-muted {
        font-size: 0.9rem;
    }
</style>

<?php
include(__DIR__ . '/../../layouts/footer.php');
?>
