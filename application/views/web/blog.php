<?php
$this->load->view('layout/header');
?>

<body>
    <?php
    $this->load->view('layout/navbar');
    ?>
    <style>
        .slider-area2 {
            background-image: url('<?= base_url() ?>assets/img/hero/blog.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .page-link a {
            color: black;
            font-size: 24px;
        }

        .isi-blog ol li {
            list-style-type: inherit;
            font-size: 15px;
        }

        .isi-blog ul li {
            list-style-type: decimal;
            font-size: 15px;

        }

        .isi-blog ul {
            padding-left: 40px;
        }

        .isi-blog ol {
            padding-left: 40px;
        }

        .isi-blog hr {
            border-color: #000000;
            margin: 30px 0px;
            padding: 0;
        }

        .isi-blog b,
        sup,
        sub,
        u,
        del {
            color: #000000;
        }
    </style>
    <main>
        <!--? Slider Area Start-->
        <div class="slider-area slider-area2">
            <div class="slider-active dot-style">
                <!-- Slider Single -->
                <div class="single-slider  d-flex align-items-center slider-height2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-lg-8 col-md-10 ">
                                <div class="hero-wrapper">
                                    <div class="hero__caption">
                                        <h1 style="color: white;" data-animation="fadeInUp" data-delay=".3s">Blog</h1>
                                        <p style="color: white;" data-animation="fadeInUp" data-delay=".6s">Para Trainer dan Terapis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Area End -->
        <!--? Blog Area Start-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <?php foreach ($artikel as $data) : ?>
                        <div class="col-md-4">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="<?= base_url() ?>assets/img/artikel/<?= $data->gambar ?>" alt="">
                                    <a href="#" class="blog_item_date">
                                        <p><?php echo date('d F', strtotime($data->tgl_artikel)) ?></p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?= base_url() . $data->slug . '/blog/' . $data->slug_artikel ?>">
                                        <h2 class="blog-head" style="color: #2d2d2d;"><?= $data->judul ?></h2>
                                    </a>
                                    <div class="isi-blog"><?php limit_echo($data->isi, 200) ?></div>
                                    <ul class="blog-info-link">
                                        <li><a href="<?= base_url() . $data->slug ?>"><i class="fa fa-user"></i><?= $data->nama ?></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> -->
                                    </ul>
                                </div>
                            </article>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row justify-content-center">
                    <nav class="blog-pagination d-flex">
                        <?php echo $pagination; ?>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
        <!-- About Law End-->
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