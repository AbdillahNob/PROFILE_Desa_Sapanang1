<?php
require 'header.php';
require 'function/function.php';

$query = view("SELECT * FROM tb_profil WHERE id_profil = 1");

?>


<!-- Start Intro -->
<section class="parallax-bg" style="background-image:url(img/sapanang/bg.jpg)" data-stellar-background-ratio="0.5">
    <!-- Section Title -->
    <div class="js-height-full container">
        <div class="intro-content black-color text-center vertical-section">
            <div class="vertical-content">
                <!-- <h4 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.8s">Selamat Datang di</h4> -->
                <h1 class="wow zoomIn m-bottom-20" data-wow-duration="1s" data-wow-delay="0.6s">Desa Sapanang</h1>
                <video controls width="300">
                    <source src="img/sapanang/Profile_desa/video profil desa sapanang_1.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>
<!-- End Intro -->

<!-- Site Content
        ============================================= -->

<section id="blog-single" class="p-top-80 p-bottom-80">


    <!--Container-->
    <div class="container clearfix">

        <div class="row">

            <div class="col-xs-12">

                <!--Post Single-->
                <div class="postSingle">

                    <div class="postTitle black-color">
                        <center>
                            <h1>Detail Daerah</h1>
                            <div class="divider-small"></div>
                        </center>
                    </div>

                    <!--Post title-->
                    <?php
                    while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <p>
                            <?= $row['detail'] ?>
                        </p>

                        <div class="postTitle black-color">
                            <center>
                                <h1>Sejarah Desa</h1>
                                <div class="divider-small"></div>
                            </center>
                        </div>

                        <p>
                            <?= $row['sejarah'] ?>
                        </p>

                        <div class="postTitle black-color">
                            <center>
                                <h1>Visi & Misi</h1>
                                <div class="divider-small"></div>
                            </center>
                        </div>

                        <div class="visimisi-row black-color">
                            <div class="visimisi-col">
                                <h3>Visi</h3>
                                <p><?= $row['visi'] ?></p>
                            </div>
                            <div class="visimisi-col black-color">
                                <h3>Misi</h3>
                                <p>
                                    <?= $row['misi'] ?>
                                </p>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>

                <!-- Foto desa -->
                <div class="postTitle black-color">
                    <center>
                        <h3>Foto Profile Desa</h3>
                        <div class="divider-small"></div>
                    </center>
                </div>

                <!-- Start blog Info-->
                <section id="informasi" class="p-top-80 p-bottom-80">
                    <!-- === blog === -->
                    <div class="container ">
                        <div class="row">

                            <div id="owl-blog" class="owl-carousel owl-theme">

                                <?php
                                // dari foto Tentang Desa yang terbaru di upload
                                $query_profil = view("SELECT * FROM tb_profil");
                                while ($row = mysqli_fetch_assoc($query_profil)) :
                                ?>
                                    <!-- === Blog item 1 === -->
                                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                                        <div class="blog-media">
                                            <img src="<?= file_exists('img/sapanang/Profile_desa/' . $row['gambar']) ? 'img/sapanang/Profile_desa/' . $row['gambar'] : 'img/sapanang/Profile_desa/1.jpg' ?>">
                                        </div>
                                        <!--post media-->

                                    </div>
                                    <!-- /.blog -->
                                <?php endwhile; ?>

                            </div><!-- /#owl-testimonials -->

                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                </section>
                <!-- End foto desa   -->
            </div>
        </div>
    </div>
</section>


<?php require 'footer.php' ?>