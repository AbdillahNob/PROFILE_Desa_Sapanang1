<?php
require 'header1.php';
require 'function/function.php';

$tampilkanData = view("SELECT * FROM tb_pendidikan");

$dataPerhalaman = 2;
$totalData = mysqli_num_rows($tampilkanData);
$jumlahHalaman = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_pendidikan LIMIT $dataAwal, $dataPerhalaman");

// Validasi agar menampilkan halaman dgn jumlah trbatas
if($halamanAktif > 3 ){
    $startPage = $halamanAktif-3;
}else{
    $startPage = 1;
}

if($halamanAktif < ($jumlahHalaman-$halamanAktif)){
    $endPage = $halamanAktif+3;
}else{
    $endPage =$jumlahHalaman;
}
?>

<!-- Section Title Blog -->
<div class="section-title-bg text-center m-bottom-40">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Pendidikan</strong>
    </h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">Wadah Pendidikan
        yang ada di Desa Sapanang</p>
</div>


<!--BLog single section-->
<section class="blog-index">

    <!--Container-->
    <div class="container clearfix">
        <div class="row multi-columns-row">

            <!-- === Blog item 1 === -->
            <?php while ($row = mysqli_fetch_array($tampilkanData)) :
                // agar tulisan deskripsinya menampilkan hingga karakter ke-50 dan klik READ MORE utk baca selengkapnya
                $cut_info = substr($row['deskripsi'], 0, 50);
            ?>

                <div class="col-sm-6 m-bottom-40">


                    <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media ">
                            <a href="pendidikan_detail.php?id=<?= $row['id_pendidikan'] ?>"><img src="img/sapanang/pendidikan/<?= $row['gambar'] ?>" alt="" height="350"></a>
                        </div>

                        <!--post info-->
                        <div class="blog-post-body">
                            <h4><a class="title" href="pendidikan_detail.php?id=<?= $row['id_pendidikan'] ?>"><?= $row['nama_sekolah'] ?></a>
                            </h4>
                            <p class="p-bottom-20">
                                <?= $cut_info . " . . . . . ." ?>
                            </p>
                            <a href="pendidikan_detail.php?id=<?= $row['id_pendidikan'] ?>" class="read-more">Read More >></a>
                        </div>
                        <!--post body-->
                    </div> <!-- /.blog -->


                </div> <!-- /.inner-col -->
            <?php endwhile; ?>

            <!-- PAGINATION -->
            <div class="col-xs-12 blog-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="disabled">
                                <span>
                                    <span aria-hidden="true">
                                        <a href="?halaman=<?= $halamanAktif - 1; ?>">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                    </span>
                                </span>
                            </li>
                        <?php endif; ?>

                        <!-- FOR nomor Pagination -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="active">
                                    <span>
                                        <a href="?halaman=<?= $i; ?> "><?= $i; ?></a>
                                    </span>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php endif ?>
                            <!-- endif -->

                        <?php endfor; ?>
                        <!-- endfor -->

                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li>
                                <span aria-hidden="true">
                                    <a href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </span>
                            </li>
                        <?php endif; ?>
                        <!-- EndIf -->
                    </ul>
                </nav>
            </div>
            <!-- END PAGINATION -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->

</section>
<!--End blog single section-->


<?php require 'footer.php' ?>