<?php 
require 'template/header.php';
require '../function/function.php';

 // tdk bisa akses halaman ini jika belum login !
 if(!isset($_SESSION['hal'])){
  echo "
  <script>
    window.location.replace('login.php');
  </script>
  ";
  exit;
}

$query_penduduk = mysqli_query($conn, "SELECT * FROM tb_kk");
$query_produk = mysqli_query($conn, "SELECT * FROM tb_produk");
$query_info = mysqli_query($conn, "SELECT * FROM tb_informasi");
$query_user = mysqli_query($conn, "SELECT * FROM tb_login");
$query_surat_masuk = mysqli_query($conn, "SELECT * FROM tb_surat_masuk");
$query_surat_keluar = mysqli_query($conn, "SELECT * FROM tb_surat_keluar");


?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- login sbgi Admin apabila ID-nya 1 selain itu User -->
    <div class="row">
      <?php if ($_SESSION['level'] == 1) { ?>
        
        <!-- USER -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">

              <?php $count_user = mysqli_num_rows($query_user); ?>

              <h3><?= $count_user ?></h3>
              <p>Akun Desa</p>
            </div>
            <div class="icon">
              <i class=" glyphicon glyphicon-user"></i>
            </div>
            <a href="user.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end user -->

        <!-- data penduduk -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">

              <?php $count_penduduk = mysqli_num_rows($query_penduduk); ?>

              <h3><?= $count_penduduk ?></h3>
              <p>Data penduduk</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-list-alt"></i>
            </div>
            <a href="k_penduduk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->

          <!-- Surat Masuk -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <?php $count_surat_masuk = mysqli_num_rows($query_surat_masuk); ?>

              <h3><?= $count_surat_masuk ?></h3>
              <p>Surat Masuk</p>
            </div>

            <div class="icon">
              <i class=" glyphicon glyphicon-envelope"></i>
            </div>
            <a href="surat_masuk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- End Surat Masuk -->

         <!-- Surat Keluar -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <?php $count_surat_keluar = mysqli_num_rows($query_surat_keluar); ?>

              <h3><?= $count_surat_keluar ?></h3>
              <p>Surat Keluar</p>
            </div>

            <div class="icon">
              <i class=" glyphicon glyphicon-send"></i>
            </div>
            <a href="surat_keluar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- End Surat Keluar -->


        <!-- PRODUK -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <?php $count_produk = mysqli_num_rows($query_produk); ?>

              <h3><?= $count_produk ?></h3>
              <p>Produk Desa</p>
            </div>

            <div class="icon">
              <i class=" glyphicon glyphicon-cutlery"></i>
            </div>
            <a href="produk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end produk -->

        <!-- INFORMASI -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <?php $count_informasi = mysqli_num_rows($query_info); ?>

              <h3><?= $count_informasi != null ? $count_informasi : 0 ?></h3>
              <p>Informasi</p>
            </div>
            <div class="icon">
              <i class=" glyphicon glyphicon-info-sign"></i>
            </div>
            <a href="informasi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end informasi -->
        
<!-- Login sbgi USER -->
      <?php } else {
      ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <?php $count_penduduk = mysqli_num_rows($query_penduduk); ?>

              <h3><?= $count_penduduk ?></h3>
              <p>Data Penduduk</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-list-alt"></i>
            </div>
            <a href="cari_penduduk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end data penduduk -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <?php $count_produk = mysqli_num_rows($query_produk); ?>

              <h3><?= $count_produk ?></h3>
              <p>Produk Desa</p>
            </div>

            <div class="icon">
              <i class=" glyphicon glyphicon-cutlery"></i>
            </div>
            <a href="produk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end produk desa -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <?php $count_informasi = mysqli_num_rows($query_info); ?>

              <h3><?= $count_informasi != null ? $count_informasi : 0 ?></h3>
              <p>Informasi</p>
            </div>
            <div class="icon">
              <i class=" glyphicon glyphicon-info-sign"></i>
            </div>
            <a href="informasi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- end informasi -->
      <?php } ?>


    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require 'template/footer.php' ?>