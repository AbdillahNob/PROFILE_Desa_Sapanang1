<?php require 'header1.php';
    require 'function/function.php';

    $query_info = view("SELECT * FROM tb_struktur")
 ?>

    <!-- Section Title Blog -->
    <div class="section-title-bg text-center m-bottom-40">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>STRUKTUR Pemerintahan Desa</strong>
        </h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">Informasi tentang struktur</p>
    </div>


    <!--BLog single section-->
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">
            <div class="row multi-columns-row">


                <!-- === Blog item 1 === -->
                <?php while ($row = mysqli_fetch_array($query_info)) :
                    ?>

                <div class="col-sm-6 m-bottom-40">


                    <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <img src="img/sapanang/struktur/<?= $row['gambar'] ?>" alt="" >
                        </div>
 
                        <!--post info-->
                        <div class="blog-post-body">
                            <h4>Nama : <?= $row['nama'];?></h4>
                            <h4>Jabatan : <?= $row['jabatan'] ?>
                        </div>
                        <!--post body-->
                    </div> <!-- /.blog -->


                </div> <!-- /.inner-col -->
                <?php endwhile; ?>
                

            </div> <!-- /.row -->
        </div> <!-- /.container -->

    </section>
    <!--End blog single section-->


    <?php require 'footer.php' ?>