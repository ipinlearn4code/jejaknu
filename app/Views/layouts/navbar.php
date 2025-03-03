<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="/" class="navbar-brand ms-4 ms-lg-0">

        <h1 class="m-0" style="color: #15B392;"><img class="me-3" src="img/icons/logonu.png" alt="Icon"
                width="100">JEJAKNU</h1>

    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?php echo base_url('/dashboard'); ?>" class="nav-item nav-link active">Dashboard</a>
            <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                <a href="<?php echo base_url('/posts'); ?>" class="nav-item nav-link">Kelola Artikel</a>
            <?php endif; ?>
            <a href="<?php echo base_url('cadre'); ?>" class="nav-item nav-link">Profil Kader</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Event</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="<?php echo base_url('/eventRutin'); ?>" class="dropdown-item">Rutin</a>
                    <a href="<?php echo base_url('/ eventSpesial'); ?>" class="dropdown-item">Spesial</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jejak Kabar</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="<?php echo base_url('/news'); ?>" class="dropdown-item">News</a>
                    <a href="<?php echo base_url('/artikel'); ?>" class="dropdown-item">Artikel</a>
                </div>
            </div>
        </div>
        <?php if (session()->get('logged_in')): ?>
            <a href="<?= base_url('/logout') ?>" class="btn py-2 px-4"
                style="background-color: #15B392; color: white;">Logout</a>
        <?php else: ?>
            <button class="btn py-2 px-4" style="background-color: #15B392; color: white;" data-bs-toggle="modal"
                data-bs-target="#loginModal">Login</button>
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
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="registerModal" tabindex="-1">
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
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label>NIK:</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama:</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat:</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Pendidikan Terakhir:</label>
                        <select class="form-control" name="pendidikan" required>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="Diploma">Diploma</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Keahlian:</label>
                        <input type="text" class="form-control" name="keahlian" required>
                    </div>
                    <div class="mb-3">
                        <label>Password:</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label>Repeat Password:</label>
                        <input type="password" class="form-control" id="repeatPassword" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


<script>
    // document.getElementById("loginForm").addEventListener("submit", function (e) {
    //     e.preventDefault();

    //     let formData = new FormData(this);

    //     fetch("<//?= base_url('/loginProcess') ?>", {
    //         method: "POST",
    //         body: formData
    //     })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.error) {
    //                 alert(data.error);
    //             } else {
    //                 alert("Login berhasil!");
    //                 window.location.href = data.redirect;
    //             }
    //         })
    //         .catch(error => console.error("Error:", error));
    // });
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