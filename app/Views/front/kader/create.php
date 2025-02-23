<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar2') ?>

<div class="bg-container">
    <div class="overlay"></div> <!-- Overlay transparan -->

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4 text-primary fw-bold">Profil Kader</h3>

                    <p class="text-center text-muted mb-4">
                        “Menjadi kader berarti berkontribusi untuk perubahan yang lebih baik.” 🌟
                    </p>

                    <form action="<?= base_url('cadre') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nik" class="fw-semibold">NIK</label>
                            <input type="text" class="form-control input-custom" id="nik" name="nik" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="fw-semibold">Nama</label>
                            <input type="text" class="form-control input-custom" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="fw-semibold">Alamat</label>
                            <textarea class="form-control input-custom" id="address" name="address" rows="3"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="lulusan" class="fw-semibold">Lulusan</label>
                            <input type="text" class="form-control input-custom" id="education" name="education" required>
                        </div>

                        <div class="mb-3">
                            <label for="keahlian" class="fw-semibold">Keahlian</label>
                            <input type="text" class="form-control input-custom" id="keahlian" name="skill" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-5 px-5 mt-3 shadow-sm">Simpan
                                Profil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    /* Container dengan background gambar */
    .bg-container {
        position: relative;
        background-image: url('/img/bg3.png');
        /* Ganti dengan path gambar */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Overlay untuk efek transparan */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Warna hitam transparan */
        z-index: 1;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    /* Efek pada form */
    .card {
        background: rgba(255, 255, 255, 0.9);
        /* Card semi transparan */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .input-custom {
        border: 2px solid #dee2e6;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .input-custom:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    .btn-primary {
        transition: all 0.3s ease-in-out;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }
</style>

<?= $this->include('layouts/footer') ?>