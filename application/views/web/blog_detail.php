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
    </style>
    <main>
        <!--? Blog Area Start -->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="<?= base_url() ?>assets/img/artikel/<?= $artikel->gambar ?>" alt="">
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;"><?= $artikel->judul ?>
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= $artikel->nama ?></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> -->
                                </ul>
                                <div class="isi-blog">
                                    <?= $artikel->isi ?>
                                </div>
                            </div>
                        </div>
                        <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="<?= base_url() ?>assets/img/user/<?= $artikel->foto ?>" alt="">
                                <div class="media-body">
                                    <a href="#">
                                        <h4><?= $artikel->nama ?></h4>
                                    </a>
                                    <p><?= $artikel->profil ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area" id="comment">
                            <h4><?= count($comment) ?> Comments</h4>
                            <?php foreach ($comment as $data) : ?>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc">
                                                <p class="comment">
                                                    <?= $data->comment ?>
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <?= $data->nama_visitor ?> | <?= $data->email_visitor ?>
                                                        </h5> <br />
                                                        <p class="date"><?php echo date('F d Y, H:i ', strtotime($data->created_at)) ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>

                            <form class="form-contact comment_form" method="post" action="<?= site_url('blog/comment') ?>" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="nama_visitor" id="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email_visitor" id="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="web_visitor" id="website" type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_artikel" value="<?= $artikel->id_artikel ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
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