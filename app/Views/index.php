<?php
include('layouts/header.php');
?>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 4rem; height: 4rem;" role="status">
        </div>
        <img class="position-absolute top-50 start-50 translate-middle spinner-img" src="img/icons/logonu2.png"
            alt="Icon">
    </div>

    <style>
        /* Animasi loading */
        @keyframes fadeInOut {
            0% {
                opacity: 0.3;
                transform: scale(0.8);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0.3;
                transform: scale(0.8);
            }
        }

        /* Ukuran gambar lebih kecil & animasi */
        .spinner-img {
            width: 80px;
            height: 80px;
            animation: fadeInOut 1.5s infinite ease-in-out;
        }
    </style>


    <?php
    include('layouts/navbar.php');
    ?>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <?php if (!empty($articles) && is_array($articles)): ?>
                <?php foreach ($articles as $item): ?>
                    <?php
                    preg_match('/<img[^>]+src="([^"]+)"/i', $item['content'], $matches);
                    $imageSrc = $matches[1] ?? base_url('img/default.jpg'); // Gunakan default jika tidak ada gambar
                    ?>

                    <div class="owl-carousel-item position-relative" data-dot="<img src='<?= $item['featured_image'] ?>'>">
                        <img class="img-fluid carousel-img" src="<?= $imageSrc ?>" alt="<?= esc($item['title']) ?>">
                        <div class="owl-carousel-inner">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-10 col-lg-8">
                                        <h1 class="display-4 text-white animated slideInDown"><?= esc($item['title']) ?></h1>
                                        <p class="fs-6 fw-medium text-white mb-3 pb-2">
                                            <?= word_limiter(strip_tags($item['content']), 30) ?>
                                        </p>
                                        <a href="<?= base_url('posts/' . $item['id']) ?>"
                                            class="btn btn-primary py-2 px-4 animated slideInLeft">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid carousel-img" src="img/default.jpg" alt="No posts available">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-4 text-white animated slideInDown">No Articles Found</h1>
                                    <p class="fs-6 fw-medium text-white mb-3 pb-2">There are currently no articles
                                        available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Carousel End -->

    <style>
        /* Mengatur tinggi carousel agar lebih kecil */
        .owl-carousel-item {
            height: 500px;
            /* Ubah tinggi carousel */
        }

        .carousel-img {
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
        }

        /* Menyesuaikan ukuran teks */
        h1 {
            font-size: 2rem;
            /* Ukuran judul lebih kecil */
        }

        p {
            font-size: 1rem;
            /* Ukuran paragraf lebih kecil */
        }

        /* Menyesuaikan ukuran tombol */
        .btn {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
    </style>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/about-1.jpg" alt="">
                        <img class="img-fluid" src="img/about-2.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">Tentang Kami</h4>
                    <h1 class="display-5 mb-4">Pengurus Cabang Nahdlatul Ulama Malang</h1>
                    <p>
                    <p>PCNU berkomitmen untuk membangun masyarakat yang berlandaskan pada nilai-nilai Ahlussunnah wal
                        Jama’ah. Melalui berbagai program keagamaan, pendidikan, sosial, dan ekonomi, kami berupaya
                        untuk memberikan manfaat nyata bagi umat.</p>
                    </p>
                    <p class="mb-4">Dengan semangat kebersamaan, PCNU terus berperan aktif dalam meningkatkan
                        kesejahteraan masyarakat serta memperkuat ukhuwah Islamiyah, wathoniyah, dan basyariyah. Kami
                        percaya bahwa melalui kerja sama dan dedikasi, kita dapat membangun peradaban yang lebih baik.
                    </p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary"
                            style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up">25</h1>
                        </div>
                        <div class="ps-4">
                            <h3>Tahun</h3>
                            <h3>Dedikasi</h3>
                            <h3 class="mb-0">Untuk Umat</h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary"
                            style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up"><?php echo $cadreCount;?></h1>
                        </div>
                        <div class="ps-4">
                            <h3>Kader</h3>
                            <h3>Aktif</h3>
                            <h3 class="mb-0">Kota Malang</h3>
                        </div>
                    </div>
                    <!-- <a class="btn btn-primary py-3 px-5" href="">Selengkapnya</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/award.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Jaringan & Solidaritas Kuat</h3>
                        <p class="mb-0">Menjadi bagian dari Pemuda NU membuka kesempatan membangun relasi dengan kader,
                            ulama, dan profesional di berbagai bidang, menciptakan komunitas yang solid dan saling
                            mendukung.

                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/mouse-circle.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Pengembangan Diri & Kepemimpinan</h3>
                        <p class="mb-0">Pemuda NU menyediakan pelatihan kepemimpinan, seminar, dan kajian keislaman yang
                            meningkatkan keterampilan organisasi, komunikasi, serta wawasan keagamaan dan kebangsaan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/global-edit.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Kontribusi Nyata untuk Masyarakat</h3>
                        <p class="mb-0">Terlibat dalam berbagai program sosial, pendidikan, dan dakwah yang memberikan
                            manfaat langsung bagi umat, sekaligus menjadi ladang amal dan pengalaman berharga.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    </section>
    <section class="py-1 bg-light">
        <div class="container">
            <div class="text-center mb-3">
                <h6 class="text-primary fw-semibold">Berita Terbaru</h6>
                <h3 class="fw-bold">Stay Updated</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-2">

                <?php if (!empty($news) && is_array($news)): ?>
                    <?php foreach ($news as $newsItem): ?>
                        <div class="col">
                            <a href="<?= base_url('posts/' . $newsItem['id']) ?>"
                                class="card border-0 shadow-sm rounded-pill h-100 news-card text-decoration-none">
                                <?php
                                // Ambil gambar pertama dari content
                                preg_match('/<img.*?src=["\'](.*?)["\']/', $newsItem['content'], $matches);
                                $contentImage = $matches[1] ?? null;
                                ?>

                                <img src="<?= $contentImage ?: esc($newsItem['featured_image']) ?>"
                                    class="card-img-top rounded-top-pill" alt="<?= esc($newsItem['title']) ?>">

                                <div class="card-body">
                                    <h6 class="card-title fw-bold"><?= esc($newsItem['title']) ?></h6>
                                    <p class="card-text text-muted small">
                                        <?= word_limiter(strip_tags($newsItem['content']), 10) ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="col">
                        <p>No posts available at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- News Section End -->

    <style>
        .news-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            max-height: 250px;
            /* Membatasi tinggi card */
            overflow: hidden;
            /* Menghindari konten keluar dari card */
            position: relative;
        }

        .news-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .news-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.05);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .news-card:hover::after {
            opacity: 1;
        }

        .rounded-pill {
            border-radius: 20px !important;
        }

        .rounded-top-pill {
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        .card-img-top {
            max-height: 180px;
            /* Membatasi tinggi gambar */
            object-fit: cover;
            /* Menjaga aspek rasio gambar */
            transition: transform 0.3s ease-in-out;
        }

        .news-card:hover .card-img-top {
            transform: scale(1.05);
        }
    </style>







    <?php
    include('layouts/footer.php')
        ?>
</body>

</html>