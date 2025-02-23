<?php
include(__DIR__ . '/../../layouts/header.php');
include(__DIR__ . '/../../layouts/navbar.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Event Spesial</h2>
    <p class="text-center text-muted">Kegiatan eksklusif yang diadakan pada momen tertentu seperti seminar, perayaan, atau kegiatan nasional.</p>

    <div class="row">
        <?php 
        // Data event sementara (bisa diganti dengan database)
        $events = [
            ["title" => "Seminar Kebangsaan", "desc" => "Seminar nasional membahas peran pemuda dalam pembangunan bangsa.", "img" => "seminar.jpg", "date" => "20 Mei 2025", "link" => base_url('/event/spesial/seminar')],
            ["title" => "Hari Santri Nasional", "desc" => "Perayaan Hari Santri dengan berbagai kegiatan religius dan kebangsaan.", "img" => "santri.jpg", "date" => "22 Oktober 2025", "link" => base_url('/event/spesial/santri')],
            ["title" => "Festival Budaya", "desc" => "Acara menampilkan seni dan budaya lokal untuk memperkenalkan warisan budaya.", "img" => "festival.jpg", "date" => "10 Agustus 2025", "link" => base_url('/event/spesial/festival')],
            ["title" => "Pelatihan Digital Marketing", "desc" => "Workshop eksklusif untuk meningkatkan keterampilan digital kader.", "img" => "digital.jpg", "date" => "5 Juli 2025", "link" => base_url('/event/spesial/digital')],
            ["title" => "Bakti Sosial Ramadan", "desc" => "Kegiatan amal selama Ramadan dengan berbagi makanan dan santunan.", "img" => "ramadan.jpg", "date" => "Ramadan 2025", "link" => base_url('/event/spesial/baksos')],
            ["title" => "Peringatan Hari Pahlawan", "desc" => "Upacara dan seminar mengenang jasa para pahlawan bangsa.", "img" => "pahlawan.jpg", "date" => "10 November 2025", "link" => base_url('/event/spesial/pahlawan')]
        ];
        ?>

        <?php foreach ($events as $event) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card event-card shadow-lg border-0">
                <img src="<?php echo base_url('assets/img/' . $event['img']); ?>" class="card-img-top event-img" alt="<?= $event['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $event['title']; ?></h5>
                    <p class="card-text text-muted"><i class="bi bi-calendar-event"></i> <?= $event['date']; ?></p>
                    <p class="card-text"><?= $event['desc']; ?></p>
                    <a href="<?= $event['link']; ?>" class="btn btn-danger">Detail Event</a>
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
        background: linear-gradient(to bottom, #fff, #f8f9fa);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    }

    .event-img {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .btn-danger {
        border-radius: 25px;
        padding: 8px 20px;
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .text-muted {
        font-size: 0.9rem;
    }
</style>

<?php
include(__DIR__ . '/../../layouts/footer.php');
?>
