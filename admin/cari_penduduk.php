<?php
require 'template/header.php';
require '../function/function.php';

// Searching and Klik Button Cari
if (isset($_POST['search'])) {
  $cari = $_POST['cari'];
  // agar nilai inputan bs di bwh ke halaman lain/pagination
  $_SESSION['cari'] = $cari;
} else if(isset($_SESSION['cari'])) {
  // agar nilai inputan bs di bwh ke halaman lain/pagination
  $cari = $_SESSION['cari'];
}
// Bila tdk Klik Search dan cari
else{
  $cari = "";
}

// jika $cari kosong maka ambil smua nilai dlm tabel tb_kk
// % data yg mirip di nilai di awal dan akhir dgn data lain.
$query = "SELECT * FROM tb_kk WHERE 
            no_kk LIKE '%$cari%' OR
            nik LIKE '%$cari%' OR
            nama LIKE '%$cari%' OR
            nama_keluarga LIKE '%$cari%' OR
            dusun LIKE '%$cari%'
            ";
$cariData = view($query);

$dataPerhalaman = 10;
$totalData = mysqli_num_rows($cariData);
$jumlahHalaman = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;
// var_dump($dataAwal);

// PAGINATION dan tampilkan Data Penduduk brdsrkn Halamanny sebelum di Searching.
$cariData  = view("SELECT * FROM tb_kk WHERE 
                  no_kk LIKE '%$cari%'OR
                  nik LIKE '%$cari%' OR
                  nama LIKE '%$cari%' OR
                  nama_keluarga LIKE '%$cari%' OR
                  dusun LIKE '%$cari%'
                  LIMIT $dataAwal, $dataPerhalaman");

// Validasi Agar tampil 3 Hal ke kiri dan 3 Hal ke-kanan dri Halaman yg aktif.
// agar semua nomor halaman tdk di tampilkan
if ($halamanAktif > 3) {
  $start_no = $halamanAktif - 3;
} else {
  $start_no = 1;
}

if ($halamanAktif < ($jumlahHalaman - 3)) {
  $end_no = $halamanAktif + 3;
} else {
  $end_no = $jumlahHalaman;
}
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Penduduk Desa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data Penduduk Desa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Penduduk Desa</h3>
          </div><!-- /.box-header -->


          <div class="box-body">
            <!-- Form Search -->
            <form class="form-inline active-purple" action="" method="POST">
              <input name="cari" class="form-control form-control-sm mr-3 w-75 " type="search" placeholder="Cari penduduk" aria-label="Search" autocomplete="off" autofocus>
              <button type="submit" class="btn btn-success " name="search">Cari</button>
              <button type="submit" class="btn btn-primary " name="search">Refresh<a href="clean_search.php"></a></button>

            </form>
            <ul class="pagination">
              <!-- Next Halaman -->
              <?php if ($halamanAktif > 1) : ?>
             
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif -1 ?>">Previous</a></li>
              <?php endif ?>

              <!-- Perulangan -->
              <?php for ($i = $start_no; $i <= $end_no; $i++) : ?>

                <!-- validasi mmberikan tanda warna ke halaman yg sdng di Akses -->
                <?php if ($halamanAktif == $i) : ?>
                  <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php else : ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>


              <?php endfor ?>
              <!-- End Perulangan -->

              <!-- Previous Halaman -->
              <?php if ($halamanAktif < $jumlahHalaman) : ?>
          
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif +1 ?>">Next</a></li>
              <?php endif ?>
            </ul>

            <div class="table-responsive text-nowrap" style="overflow-x: scroll">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor KK</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Nama Keluarga</th>
                    <th>Hubungan dalam Keluarga</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Golongan Darah</th>
                    <th>Dusun</th>
                  </tr>
                </thead>

                <?php
                $i = $dataAwal+1;
                while ($row = mysqli_fetch_assoc($cariData)) :
                ?>
                  <tbody>
                    <td><?= $i++ ?></td>
                    <td><?= $row['no_kk'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['jns_kelamin'] ?></td>
                    <td><?= $row['tempat_lahir'] ?></td>
                    <td><?= $row['tgl_lahir'] ?></td>
                    <td><?= $row['nama_keluarga'] ?></td>
                    <td><?= $row['hubungan_dlm_keluarga'] ?></td>
                    <td><?= $row['agama'] ?></td>
                    <td><?= $row['pendidikan'] ?></td>
                    <td><?= $row['pekerjaan'] ?></td>
                    <td align="center"><?= $row['darah'] ?></td>
                    <td><?= $row['dusun'] ?></td>
                  </tbody>

                <?php endwhile; ?>


              </table>
            </div>

          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require 'template/footer.php' ?>