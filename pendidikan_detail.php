<?php
require 'header1.php';
require 'function/function.php';

$id = $_GET['id'];
$query_info_detail = view("SELECT * FROM tb_pendidikan WHERE id_pendidikan = $id");
?>

<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80">

    <!--Container-->
    <div class="container clearfix">

        <div class="row">

            <div class="col-xs-12">

                <!--Post Single-->
                <div class="postSingle">

                    <?php
                    while ($row = mysqli_fetch_array($query_info_detail)) :

                    ?>

                        <div class="postMedia">
                            <img alt="" src="img/sapanang/pendidikan/<?= $row['gambar'] ?>">
                        </div>
                        <!--Post image-->

                        <div class="postMeta clearfix">
                            <div class="postMeta-info">

                                <span class="metaCategory"><i class="fa fa-folder"></i> <a href="#">Research</a></span>

                                <span class="metaComment"><i class="fa fa-comments"></i> <a href="#">3
                                        comments</a></span>

                            </div>
                            <div class="postMeta-date">
                                <span class="metaDate"><i class="fa fa-area-chart"></i> <a href="#"><?= $row['alamat'] ?></a></span>
                            </div>
                        </div>
                        <!--Post meta-->

                        <div class="postTitle">
                            <h1><?= $row['nama_sekolah'] ?></h1>
                            <div class="divider-small"></div>
                        </div>
                        <!--Post title-->

                        <p>
                            <?= $row['deskripsi'] ?>
                        </p>

                    <?php endwhile; ?>
                </div>
                <!--End post single-->

            </div> <!-- /.col -->

        </div> <!-- /.row -->
        <hr>
        <div class="container">
            <div class="row">

                <?php
                $query_sub = view("SELECT * FROM tb_pendidikan LIMIT 3");
                while ($row = mysqli_fetch_array($query_sub)) :
                    $cut_info = substr($row['deskripsi'], 0, 50);

                ?>
                    <!-- Sub Informasi -->
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="img/sapanang/pendidikan/<?= $row['gambar'] ?>" alt="" height="200">
                            <div class="caption">
                                <h6><?= $row['nama_sekolah'] ?></h6>
                                <p><?= $cut_info ?></p>
                                <p><a href="pendidikan_detail.php?id=<?= $row['id_pendidikan'] ?>" class="btn btn-primary" role="button">Cek Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>


            </div>
        </div>

    </div> <!-- /.container -->

</section>
<!--End blog single section-->




<?php require 'footer.php'; ?>