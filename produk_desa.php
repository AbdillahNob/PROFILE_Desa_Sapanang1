<?php require 'header1.php';
require 'function/function.php';

$query_produk = view("SELECT * FROM tb_produk");

$dataPerhalaman = 4;
$totalData = mysqli_num_rows($query_produk);
$jumlahHalaman = ceil($totalData/$dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman']:1;

$dataAwal = ($halamanAktif * $dataPerhalaman)-$dataPerhalaman;

$query_produk = view("SELECT * FROM tb_produk LIMIT $dataAwal, $dataPerhalaman");

// Validasi agar menampilkan halaman dgn jumlah trbatas
if($halamanAktif > 3){
    $startPage = $halamanAktif - 3;
}else{
    $startPage = 1;
}

if($halamanAktif < ($jumlahHalaman-$halamanAktif)){
    $endPage = $halamanAktif + 3;
}else{
    $endPage = $jumlahHalaman;
}
?>


<!-- Section Title Portfolio -->
<div class="section-title-bg text-center">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>PRODUK DESA</strong>
    </h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">PRODUK-PRODUK YANG ADA DI
        DESA
        SAPANANG</p>
</div>


<!-- Start Portfolio -->
<section id="portfolio" class="p-top-80 p-bottom-80">
    <div class="container">

        <!-- Portfolio -->
        <div class="portfolio portfolio-isotope col-4 gutter">

            <!-- Portfolio Item -->
            <?php while ($row = mysqli_fetch_array($query_produk)) : ?>

                <div class="pf-item">

                    <!-- Button trigger modal -->
                    <a href="produk_detail.php?id=<?= $row['id_produk'] ?>" class="" >

                        <div class="pf-image">
                            <img src="img/sapanang/produk/<?= $row['gambar'] ?>" alt="" height="150">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info black-color">
                                            <h4 class="pf-title"><?= $row['judul'] ?></h4>
                                            <p>Produk Desa</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a>


                </div>
            <?php endwhile; ?>



        </div> <!-- Portfolio -->
        

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

    </div> <!-- /.container -->
</section>
<!-- End Portfolio -->


<!-- Modal -->


<?php require 'footer.php' ?>