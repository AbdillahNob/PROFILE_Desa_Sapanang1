<?php
require 'header1.php';
require 'function/function.php';

$query_info = view("SELECT * FROM tb_informasi");

$dataPerhalaman = 4;
$totalData = mysqli_num_rows($query_info);
$jumlahHalaman = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$query_info = view("SELECT * FROM tb_informasi LIMIT $dataAwal, $dataPerhalaman");

// Validasi agar menampilkan halaman dgn jumlah trbatas
if($halamanAktif > 3){
    $startPage = $halamanAktif -3;
}else{
    $startPage = 1;
}

if($halamanAktif < ($jumlahHalaman-$halamanAktif)){
    $endPage = $halamanAktif +3;
}else{
    $endPage = $jumlahHalaman;
}
?>

<!-- Section Title Blog -->
<div class="section-title-bg text-center m-bottom-40">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Informasi</strong>
    </h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">Informasi-informasi
        mengenai mengenai Desa Sapanang</p>
</div>


<!--BLog single section-->
<section class="blog-index">

    <!--Container-->
    <div class="container clearfix">
        <div class="row multi-columns-row">


            <!-- === Blog item 1 === -->
            <?php while ($row = mysqli_fetch_array($query_info)) :
                $cut_info = substr($row['deskripsi'], 0, 50);
            ?>

                <div class="col-sm-6 m-bottom-40">


                    <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="informasi_detail.php?id=<?= $row['id_informasi'] ?>"><img src="img/sapanang/informasi/<?= $row['gambar'] ?>" alt="" height="350"></a>
                        </div>
                        <!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i><?= $row['uploaded'] ?></span>
                            <span class="comments"><a href="#"><i class="fa fa-comments"></i> 4 Comments</a></span>
                        </div>
                        <!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="informasi_detail.php?id=<?= $row['id_informasi'] ?>"><?= $row['judul'] ?></a>
                            </h4>
                            <p class="p-bottom-20">
                                <?= $cut_info . " . . . . . ." ?>
                            </p>
                            <a href="informasi_detail.php?id=<?= $row['id_informasi'] ?>" class="read-more">Read More >></a>
                        </div>
                        <!--post body-->
                    </div> <!-- /.blog -->


                </div> <!-- /.inner-col -->
            <?php endwhile; ?>


            <div class="col-xs-12 blog-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="disabled">
                                <span>
                                    <span aria-hidden="true">
                                        <a href="?halaman=<?= $halamanAktif - 1; ?>"><i class="fa fa-arrow-left"></i></a>
                                    </span>
                                </span>
                            </li>
                        <?php endif; ?>

                        <!-- FOR nomor Pagination -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <?php if ($halamanAktif == $i) : ?>
                                <li class="active">
                                    <span>
                                        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a><span class="sr-only">(current)</span>
                                    </span>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="?halaman=<?= $i; ?>"><?= $i;  ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <!-- ENDFor -->

                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li>
                                <span aria-hidden="true">
                                    <a href="?halaman=<?= $halamanAktif + 1; ?>"><i class="fa fa-arrow-right"></i></a>
                                </span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div> <!-- /.blog-pagination -->
            
        </div> <!-- /.row -->
    </div> <!-- /.container -->

</section>
<!--End blog single section-->


<?php require 'footer.php' ?>