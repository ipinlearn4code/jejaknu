<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kabar Sejawat</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/navbar') ?>
</head>


<body>

    <div class="container-lg mt-4">
        <h2 class="text-center">Kabar Sejawat</h2>
        <!-- Formulir untuk mengirim pesan -->

        <?php if (session()->has('user_id')): ?>
            <form action="<?= base_url('kabar'); ?>" method="post">
                <div class="card shadow-sm p-3 border-0 custom-card">
                    <div class="chat-container">
                        <img src="<?= 'https://api.dicebear.com/9.x/pixel-art/svg?seed=' . session()->get('username'); ?>"
                            alt="Profile Picture">
                        <div class="chat-content">
                            <textarea class="form-control" id="message" name="message" rows="2"
                                placeholder="Tulis pesan atau kabar Anda..."></textarea>
                            <div class="send-btn">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-primary text-center" role="alert">Login untuk ikut memberi kabar!</div>
        <?php endif; ?>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < ceil(count($messages) / 4); $i++): ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>"></li>
                <?php endfor; ?>
            </ol>

            <!-- Carousel Content -->
            <div class="carousel-inner">
                <?php $chunks = array_chunk($messages, 10); ?>
                <?php foreach ($chunks as $index => $group): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="row">
                            <?php foreach ($group as $msg): ?>
                                <div class="col-sm-6">
                                    <div class="testimonial-wrapper">
                                        <div class="testimonial">"<?= esc($msg['message']) ?>"</div>
                                        <div class="media">
                                            <img src="<?= esc($msg['avatar']) ?>" class="mr-3 rounded-circle" width="50"
                                                height="50" alt="<?= esc($msg['username']) ?>">
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b><?= esc($msg['username']) ?></b></div>
                                                    <div class="skills"><?= esc($msg['skills']) ?></div>
                                                    <div class="details" style="font-size: 0.8em">Dikirim pada
                                                        <?= esc(date('H:i, d M Y', strtotime($msg['created_at']))) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>




    </div>

    <?= $this->include('layouts/footer') ?>

</body>

</html>