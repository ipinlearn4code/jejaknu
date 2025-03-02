    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            
        <h1 class="m-0" style="color: #15B392;"><img class="me-3" src="img/icons/logonu.png" alt="Icon" width="100">JEJAKNU</h1>

        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url('cadre'); ?>" class="nav-item nav-link active">Profil Kader</a>
               

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">data event</a>
                    <div class="dropdown-menu border-0 m-0">
                    <a href="<?php echo base_url('/dataeventspesial'); ?>" class="dropdown-item">Spesial</a>
                    <a href="<?php echo base_url('/dataeventrutin'); ?>" class="dropdown-item">Rutin</a>
                    </div>
                </div>

                 <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">data kabar</a>
                    <div class="dropdown-menu border-0 m-0">
                    <a href="<?php echo base_url('/datanews'); ?>" class="dropdown-item">News</a>
                    <a href="<?php echo base_url('/dataartikel'); ?>" class="dropdown-item">Artikel</a>
                    <a href="<?php echo base_url('/post'); ?>" class="dropdown-item">Posting Baru</a>
                    </div>
                </div>
                </div>
                <?php if(session()->get('logged_in')): ?>
        <a href="<?= base_url('/logout') ?>" class="btn py-2 px-4" style="background-color: #15B392; color: white;">Logout</a>
    <?php else: ?>
        <button class="btn py-2 px-4" style="background-color: #15B392; color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <?php endif; ?>
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
                        <label>Email:</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Password:</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="mt-2 text-center">Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</a></p>
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
                        <label>Email:</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Password:</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("<?= base_url('/loginProcess') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error); // Menampilkan error jika login gagal
        } else {
            alert("Login berhasil!");
            window.location.href = data.redirect; // Redirect ke halaman sesuai role
        }
    })
    .catch(error => console.error("Error:", error));
});

document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("<?= base_url('/registerProcess') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error); // Menampilkan error jika registrasi gagal
        } else {
            alert("Registrasi berhasil! Silakan login.");
            var registerModal = new bootstrap.Modal(document.getElementById("registerModal"));
            registerModal.hide(); // Menutup modal register
            var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
            loginModal.show(); // Membuka modal login
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

    </nav>
    <!-- Navbar End -->



    