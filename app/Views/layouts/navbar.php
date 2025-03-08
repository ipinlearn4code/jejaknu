<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href=<?= base_url('/') ?> class="navbar-brand ms-4 ms-lg-0">

        <h1 class="m-0" style="color: #15B392;"><img class="me-3" src=<?= base_url('img/icons/logonu.png') ?> alt="Icon"
                width="100">JEJAKNU</h1>
<style>
    .nav-link.active,
.dropdown-item.active {
    color: #15B392 ; /* Warna biru (sesuaikan dengan tema) */
}

.nav-link,
.dropdown-item {
    color: #000 ; /* Warna default */
}
/* Override warna latar belakang dropdown-item aktif */
.dropdown-item.active, 
.dropdown-item:active {
    background-color: transparent !important;
   
}

</style>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
    <a href="<?= base_url('/dashboard'); ?>" 
   class="nav-item nav-link <?= (rtrim(current_url(), '/') == rtrim(base_url('/dashboard'), '/') || rtrim(current_url(), '/') == rtrim(base_url(), '/')) ? 'active' : '' ?>">
    Dashboard
</a>

        <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
            <a href="<?php echo base_url('/posts'); ?>" 
               class="nav-item nav-link <?= (current_url() == base_url('/posts')) ? 'active' : '' ?>">
                Kelola Artikel
            </a>
        <?php endif; ?>
        <a href="<?php echo base_url('/cadre'); ?>" 
           class="nav-item nav-link <?= (current_url() == base_url('/cadre')) ? 'active' : '' ?>">
            Profil Kader
        </a>
        <a href="<?php echo base_url('/events'); ?>" 
           class="nav-item nav-link <?= (current_url() == base_url('/events')) ? 'active' : '' ?>">
            Acara
        </a>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle <?= (in_array(uri_string(), ['kabar', 'posts/news', 'posts/article', 'posts/new'])) ? 'active' : '' ?>" 
               data-bs-toggle="dropdown">Jejak Kabar</a>
            <div class="dropdown-menu border-0 m-0">
                <a href="<?php echo base_url('/kabar'); ?>" 
                   class="dropdown-item <?= (current_url() == base_url('/kabar')) ? 'active' : '' ?>">
                    Kabar Sejawat
                </a>
                <a href="<?php echo base_url('/posts/news'); ?>" 
                   class="dropdown-item <?= (current_url() == base_url('/posts/news')) ? 'active' : '' ?>">
                    Berita
                </a>
                <a href="<?php echo base_url('/posts/article'); ?>" 
                   class="dropdown-item <?= (current_url() == base_url('/posts/article')) ? 'active' : '' ?>">
                    Artikel
                </a>
                <?php if (session()->get('logged_in')): ?>
                    <a href="<?= base_url('/posts/new') ?>" 
                       class="dropdown-item <?= (current_url() == base_url('/posts/new')) ? 'active' : '' ?>">
                        Tulis Baru
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

        <?php if (session()->get('logged_in')): ?>
  <!-- Tombol Profil -->
<a href="javascript:void(0);" class="d-flex align-items-center text-decoration-none" id="profileBtn">
    <img src="<?= session()->get('user_photo') ?: base_url('img/about-1.jpg') ?>" alt="Profile" class="rounded-circle" width="40" height="40">
</a>

<!-- Offcanvas Profile (Popup di Samping Kanan) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="profileOffcanvas" aria-labelledby="profileOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 id="profileOffcanvasLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column align-items-center">
        <button class="btn btn-secondary rounded-circle mb-3 p-0" style="height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            <img src="<?= session()->get('user_photo') ?: base_url('img/about-1.jpg') ?>" class="rounded-circle" style="height: 100%; width: 100%; object-fit: cover;"/>
        </button>
        <span class="name fw-bold" style="font-size: 20px;">
            <?= session()->get('user_name') ?: 'User Name' ?>
        </span>
        <span class="idd text-muted" style="font-size: 14px;">
            @<?= session()->get('user_email') ?: 'useremail' ?>
        </span>
        
        <div class="d-flex mt-3 w-100 px-3">
            <a href="<?= base_url('/profile-settings') ?>" class="btn btn-dark text-white w-100 py-2 rounded-pill shadow-sm">Edit Profile</a>
        </div>
        <div class="d-flex mt-2 w-100 px-3">
            <a href="<?= base_url('/logout') ?>" class="btn btn-danger text-white w-100 py-2 rounded-pill shadow-sm">Logout</a>
        </div>
    </div>
</div>

<?php else: ?>
<!-- Tombol Login -->
<button class="btn py-2 px-4" style="background-color: #15B392; color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
<?php endif; ?>

<!-- Tambahkan JavaScript untuk Mencegah Popup Otomatis -->




<!-- Tambahkan Bootstrap Icons dan FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label>Email atau Username:</label>
                        <input type="username" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Password:</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="mt-2 text-center">Belum punya akun? <a href="#" data-bs-toggle="modal"
                        data-bs-target="#registerModal">Daftar</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    <div class="mb-3">
                        <label>Username:</label>
                        <input type="text" class="form-control" id="registerUsername" name="username" required>
                        <div class="invalid-feedback" id="errorUsername"></div>
                    </div>
                    <div class="mb-3">
                        <label>NIK:</label>
                        <input type="text" class="form-control" id="registerNIK" name="nik" required>
                        <div class="invalid-feedback" id="errorNIK"></div>
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" required>
                        <div class="invalid-feedback" id="errorEmail"></div>
                    </div>
                    <div class="mb-3">
                        <label>Password:</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                        <div class="invalid-feedback" id="errorPassword"></div>
                    </div>
                    <div class="mb-3">
                        <label>Repeat Password:</label>
                        <input type="password" class="form-control" id="registerRepeatPassword" name="repeat_password"
                            required>
                        <div class="invalid-feedback" id="errorRepeatPassword"></div>
                    </div>
                    <div class="mb-3">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="registerName" name="name" required>
                        <div class="invalid-feedback" id="errorName"></div>
                    </div>
                    <div class="mb-3">
                        <label>Alamat:</label>
                        <input type="text" class="form-control" id="registerAddress" name="address" required>
                        <div class="invalid-feedback" id="errorAddress"></div>
                    </div>
                    <div class="mb-3">
                        <label>Pendidikan Terakhir:</label>
                        <input type="text" class="form-control" id="registerEducation" name="education" required>
                        <div class="invalid-feedback" id="errorEducation"></div>
                    </div>
                    <div class="mb-3">
                        <label>Keahlian:</label>
                        <input type="text" class="form-control" id="registerSkills" name="skills" required>
                        <div class="invalid-feedback" id="errorSkills"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  

  document.addEventListener("DOMContentLoaded", function () {
    var offcanvasElement = document.getElementById("profileOffcanvas");
    var profileBtn = document.getElementById("profileBtn");
    var bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);

    // Pastikan popup tidak muncul otomatis saat halaman dibuka
    bsOffcanvas.hide();

    // Event listener untuk menampilkan popup hanya saat tombol profile diklik
    profileBtn.addEventListener("click", function () {
        bsOffcanvas.show();
    });

    // Pastikan popup tidak terbuka otomatis ketika halaman "/profile-settings" dibuka
    if (window.location.pathname === "/profile-settings") {
        bsOffcanvas.hide();
    }
});


    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("<?php echo base_url('/loginProcess'); ?>", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else if (data.success) {
                    alert("Login berhasil!");
                    window.location.href = data.redirect; // Redirect ke halaman utama
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan! Coba lagi.");
            });
    });


    document.getElementById("registerForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("<?= base_url('/registerProcess') ?>", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // Reset semua error message sebelumnya
                document.querySelectorAll(".invalid-feedback").forEach(el => el.textContent = "");
                document.querySelectorAll(".form-control").forEach(el => el.classList.remove("is-invalid"));

                if (data.error) {
                    // Menampilkan error di masing-masing kolom input
                    if (data.error.username) {
                        document.getElementById("errorUsername").textContent = data.error.username;
                        document.getElementById("registerUsername").classList.add("is-invalid");
                    }
                    if (data.error.nik) {
                        document.getElementById("errorNIK").textContent = data.error.nik;
                        document.getElementById("registerNIK").classList.add("is-invalid");
                    }
                    if (data.error.email) {
                        document.getElementById("errorEmail").textContent = data.error.email;
                        document.getElementById("registerEmail").classList.add("is-invalid");
                    }
                    if (data.error.password) {
                        document.getElementById("errorPassword").textContent = data.error.password;
                        document.getElementById("registerPassword").classList.add("is-invalid");
                    }
                    if (data.error.repeat_password) {
                        document.getElementById("errorRepeatPassword").textContent = data.error.repeat_password;
                        document.getElementById("registerRepeatPassword").classList.add("is-invalid");
                    }
                    if (data.error.name) {
                        document.getElementById("errorName").textContent = data.error.name;
                        document.getElementById("registerName").classList.add("is-invalid");
                    }
                    if (data.error.address) {
                        document.getElementById("errorAddress").textContent = data.error.address;
                        document.getElementById("registerAddress").classList.add("is-invalid");
                    }
                    if (data.error.education) {
                        document.getElementById("errorEducation").textContent = data.error.education;
                        document.getElementById("registerEducation").classList.add("is-invalid");
                    }
                    if (data.error.skills) {
                        document.getElementById("errorSkills").textContent = data.error.skills;
                        document.getElementById("registerSkills").classList.add("is-invalid");
                    }
                } else {
                    alert("Registrasi berhasil! Silakan login.");
                    window.location.href = "<?= base_url('/') ?>";
                }
            })
            .catch(error => console.error("Error:", error));
    });




</script>

</nav>
<!-- Navbar End -->
