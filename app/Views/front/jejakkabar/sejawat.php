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
     
    <div class="card shadow-sm p-3 border-0 custom-card">
    <div class="chat-container">
        <img src="img/user-profile.jpg" alt="User Profile">
        <div class="chat-content">
            <textarea class="form-control" id="message" name="message" rows="2" placeholder="Tulis pesan Anda..."></textarea>
            <div class="send-btn">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>


    

    

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   

        <!-- Carousel Content -->
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-1.jpg" class="mr-3" alt="Paula Wilson">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Paula Wilson</b></div>
                                        <div class="details">Media Analyst / SkyNet</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Vestibulum quis quam ut magna consequat faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-2.jpg" class="mr-3" alt="Antonio Moreno">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Antonio Moreno</b></div>
                                        <div class="details">Web Developer / SoftBee</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Mauris magna metus, dapibus nec turpis vel.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-3.jpg" class="mr-3" alt="Michael Holz">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Michael Holz</b></div>
                                        <div class="details">Web Developer / DevCorp</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Ut tempus dictum arcu, non tincidunt ligula bibendum.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-4.jpg" class="mr-3" alt="Mary Saveley">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Mary Saveley</b></div>
                                        <div class="details">Graphic Designer / MarsMedia</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <div class="media">
                                <img src="img/project-5.jpg" class="mr-3" alt="Martin Sommer">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Martin Sommer</b></div>
                                        <div class="details">SEO Analyst / RealSearch</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Vestibulum quis quam ut magna consequat faucibus.</div>
                            <div class="media">
                                <img src="img/project-6.jpg" class="mr-3" alt="John Williams">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>John Williams</b></div>
                                        <div class="details">Web Designer / UniqueDesign</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                    <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Mauris magna metus, dapibus nec turpis vel.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-3.jpg" class="mr-3" alt="Michael Holz">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Michael Holz</b></div>
                                        <div class="details">Web Developer / DevCorp</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                    <div class="col-sm-6">
                        <div class="testimonial-wrapper">
                            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nulla facilisi. Suspendisse potenti.
Phasellus eget sapien at libero vestibulum scelerisque.
Integer nec urna ac lorem ultricies tincidunt.</div>
                            <div class="media">
                                <img src="img/project-4.jpg" class="mr-3" alt="Mary Saveley">
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>Mary Saveley</b></div>
                                        <div class="details">Graphic Designer / MarsMedia</div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div>
                </div>
            </div>

                </div>
            </div>
            

        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>

</body>
</html>
