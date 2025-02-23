<?php
    include('layouts/header.php');
?>

<body>
    <!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 4rem; height: 4rem;" role="status"></div>
    <img class="position-absolute top-50 start-50 translate-middle spinner-img" src="img/icons/logonu2.png" alt="Icon">
</div>

<style>
/* Animasi loading */
@keyframes fadeInOut {
    0% { opacity: 0.3; transform: scale(0.8); }
    50% { opacity: 1; transform: scale(1); }
    100% { opacity: 0.3; transform: scale(0.8); }
}

/* Ukuran gambar lebih kecil & animasi */
.spinner-img {
    width: 80px; 
    height: 80px;
    animation: fadeInOut 1.5s infinite ease-in-out;
}
</style>

    <!-- Spinner End -->


    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                    <a class="text-body px-2" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 6789</a>
                    <a class="text-body px-2" href="mailto:info@example.com"><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                    <a class="text-body px-2" href="">Terms</a>
                    <a class="text-body px-2" href="">Privacy</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->

    <?php 
        include('layouts/navbar.php');
    ?>


    <!-- Carousel Start -->
   <!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='img/nu1.jpg'>">
            <img class="img-fluid carousel-img" src="img/nu1.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-4 text-white animated slideInDown">JEJAKMU</h1>
                            <p class="fs-6 fw-medium text-white mb-3 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no.</p>
                            <a href="" class="btn btn-primary py-2 px-4 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='img/nu2.jpg'>">
            <img class="img-fluid carousel-img" src="img/nu2.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-4 text-white animated slideInDown">JEJAKMU</h1>
                            <p class="fs-6 fw-medium text-white mb-3 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no.</p>
                            <a href="" class="btn btn-primary py-2 px-4 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='img/image 3.jpg'>">
            <img class="img-fluid carousel-img" src="img/image 3.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-4 text-white animated slideInDown">JEJAKMU</h1>
                            <p class="fs-6 fw-medium text-white mb-3 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no.</p>
                            <a href="" class="btn btn-primary py-2 px-4 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<style>
/* Mengatur tinggi carousel agar lebih kecil */
.owl-carousel-item {
    height: 500px; /* Ubah tinggi carousel */
}

.carousel-img {
    height: 100%;
    object-fit: cover; /* Memastikan gambar tetap proporsional */
}

/* Menyesuaikan ukuran teks */
h1 {
    font-size: 2rem; /* Ukuran judul lebih kecil */
}

p {
    font-size: 1rem; /* Ukuran paragraf lebih kecil */
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
                    <h1 class="display-5 mb-4">Pengurus Cabang Nahdlatul Ulama</h1>
                    <p><p>PCNU berkomitmen untuk membangun masyarakat yang berlandaskan pada nilai-nilai Ahlussunnah wal Jama’ah. Melalui berbagai program keagamaan, pendidikan, sosial, dan ekonomi, kami berupaya untuk memberikan manfaat nyata bagi umat.</p></p>
                    <p class="mb-4">Dengan semangat kebersamaan, PCNU terus berperan aktif dalam meningkatkan kesejahteraan masyarakat serta memperkuat ukhuwah Islamiyah, wathoniyah, dan basyariyah. Kami percaya bahwa melalui kerja sama dan dedikasi, kita dapat membangun peradaban yang lebih baik.</p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up">25</h1>
                        </div>
                        <div class="ps-4">
                            <h3>Tahun</h3>
                            <h3>Dedikasi</h3>
                            <h3 class="mb-0">Untuk Umat</h3>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5" href="">Selengkapnya</a>
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
                        <p class="mb-0">Menjadi bagian dari Pemuda NU membuka kesempatan membangun relasi dengan kader, ulama, dan profesional di berbagai bidang, menciptakan komunitas yang solid dan saling mendukung.

</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/mouse-circle.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Pengembangan Diri & Kepemimpinan</h3>
                        <p class="mb-0">Pemuda NU menyediakan pelatihan kepemimpinan, seminar, dan kajian keislaman yang meningkatkan keterampilan organisasi, komunikasi, serta wawasan keagamaan dan kebangsaan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/global-edit.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Kontribusi Nyata untuk Masyarakat</h3>
                        <p class="mb-0">Terlibat dalam berbagai program sosial, pendidikan, dan dakwah yang memberikan manfaat langsung bagi umat, sekaligus menjadi ladang amal dan pengalaman berharga.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


 <!-- News Section Start -->
<!-- <section class="py-1 bg-light">
    <div class="container">
        <div class="text-center mb-3">
            <h6 class="text-primary fw-semibold">Latest News</h6>
            <h3 class="fw-bold">Stay Updated</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-pill h-100 news-card">
                    <img src="img/about-1.jpg" class="card-img-top rounded-top-pill" alt="News 1">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Architecture Trends</h6>
                        <p class="card-text text-muted small">Latest trends shaping modern architecture...</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-pill h-100 news-card">
                    <img src="img/about-2.jpg" class="card-img-top rounded-top-pill" alt="News 2">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Sustainable Buildings</h6>
                        <p class="card-text text-muted small">How sustainability is transforming cities...</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-pill h-100 news-card">
                    <img src="img/about-3.jpg" class="card-img-top rounded-top-pill" alt="News 3">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Innovative Home Designs</h6>
                        <p class="card-text text-muted small">Exploring unique home designs...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="py-1 bg-light">
    <div class="container">
        <div class="text-center mb-3">
            <h6 class="text-primary fw-semibold">Latest News</h6>
            <h3 class="fw-bold">Stay Updated</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <?php if (! empty($posts) && is_array($posts)) : ?>
                <?php foreach ($posts as $post) : ?>
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-pill h-100 news-card">
                            <!-- <img src="<//?= esc($post['featured_image']) ?>" class="card-img-top rounded-top-pill" alt="<//?= esc($post['title']) ?>"> -->
                            <img src="uploads/cover1.jpg" class="card-img-top rounded-top-pill" alt="<?= esc($post['title']) ?>">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?= esc($post['title']) ?></h6>
                                <p class="card-text text-muted small">
                                    <?= esc(word_limiter($post['content'], 10)) ?>
                                </p>
                            </div>
                        </div>
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
        max-height: 250px; /* Membatasi tinggi card */
        overflow: hidden; /* Menghindari konten keluar dari card */
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
        max-height: 180px; /* Membatasi tinggi gambar */
        object-fit: cover; /* Menjaga aspek rasio gambar */
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