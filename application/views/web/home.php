<?php
$this->load->view('layout/header');
?>

<body>
    <?php
    $this->load->view('layout/navbar');
    ?>
    <main>
        <!--? Slider Area Start-->
        <div class="slider-area">
            <div class="slider-active dot-style">
                <!-- Slider Single -->
                <img src="<?= base_url() ?>assets/img/hero/h1.jpeg" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <!-- Slider Area End -->
        </div>
        <!-- About-2 Area End -->
        <section class="wantToWork-area section-bg3" data-background="assets/img/gallery/section_bg01.png">
            <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Trainer</h2>
                                <!-- <p>Almost before we knew it, we<br> had left the ground</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--? Services Area Start -->
        <div class="service-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($user as $data) :
                        if ($data->role == 'trainer') { ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-cat text-center mb-50">
                                    <div class="cat-icon">
                                        <img class="img-fluid rounded-circle" src="<?= base_url() ?>assets/img/user/<?= $data->foto ?>" alt="">
                                    </div>
                                    <div class="cat-cap">
                                        <h5><a href="services.html"><?= $data->nama ?></a></h5>
                                        <p><?= $data->kota ?></p>
                                        <p><?php limit_echo($data->profil, 50) ?></p>
                                        <a href="<?= base_url($data->slug) ?>" class="btn btn-md btn-outline-light align-self-end">Blog</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    endforeach ?>
                </div>
            </div>
        </div>
        <!-- About-2 Area End -->
        <section class="wantToWork-area section-bg3" data-background="assets/img/gallery/section_bg01.png">
            <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Terapis Kami</h2>
                                <!-- <p>Almost before we knew it, we<br> had left the ground</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--? Services Area Start -->
        <div class="service-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($user as $data) : ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                            <div class="single-cat text-center mb-50 ">
                                <div class="cat-icon">
                                    <img class="img-fluid rounded-circle" src="<?= base_url() ?>assets/img/user/<?= $data->foto ?>" alt="">
                                </div>
                                <div class="cat-cap h-100">
                                    <h3><?= $data->nama ?></h3>
                                    <p><?= $data->kota ?></p>
                                    <a href="<?= base_url($data->slug) ?>" class="btn btn-md btn-outline-light align-self-end">Blog</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    $this->load->view('layout/footer');
    ?>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <?php
    $this->load->view('layout/script');
    ?>
</body>

</html>
