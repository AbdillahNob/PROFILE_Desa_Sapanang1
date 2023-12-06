<?php
require 'header1.php';
require 'function/function.php';

$id = $_GET['id'];
$query_info_detail = view("SELECT * FROM tb_informasi WHERE id_informasi = $id");

$query = view("SELECT * FROM tb_informasi");

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
                            <img src="img/sapanang/informasi/<?= $row['gambar'] ?>" alt="">
                        </div>
                        <!--Post image-->

                        <div class="postMeta clearfix">
                            <div class="postMeta-info">
                                <span class="metaAuthor"><i class="fa fa-user"></i>Penulis : <a href="#"><?= $row['penulis'] ?></a></span>

                                <span class="metaCategory"><i class="fa fa-folder"></i> <a href="#">Research</a></span>

                                <span class="metaComment"><i class="fa fa-comments"></i> <a href="#">3
                                        comments</a></span>

                            </div>
                            <div class="postMeta-date">
                                <span class="metaDate"><i class="fa fa-calendar"></i> <a href="#"><?= $row['uploaded'] ?></a></span>
                            </div>
                        </div>
                        <!--Post meta-->

                        <div class="postTitle">
                            <h1><?= $row['judul'] ?></h1>
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
                while ($row = mysqli_fetch_array($query)) :
                    $cut_info = substr($row['deskripsi'], 0, 50);

                ?>
                    <!-- Sub Informasi -->
                    <div class="col-sm-6 col-md-4">
                        <div class="pf-image">
                            <img src="img/sapanang/informasi/<?= $row['gambar'] ?>" alt="" height="200" >
                            <div class="caption">
                                <h6><?= $row['judul'] ?></h6>
                                <p><?= $cut_info . ". . ."?></p>
                                <p><a href="informasi_detail.php?id=<?= $row['id_informasi'] ?>" class="btn btn-primary" role="button">Cek Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>

        </div> <!-- /.container -->

</section>
<!--End blog single section-->




<?php require 'footer.php'; ?>