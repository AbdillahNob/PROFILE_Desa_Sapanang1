<?php
require 'template/header.php';
require '../function/function.php';

$query_informasi = view("SELECT * FROM tb_informasi");

$dataPerhalaman = 3;
$totalData = mysqli_num_rows($query_informasi);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_informasi LIMIT $dataAwal,$dataPerhalaman");

if ($halamanAktif > 3) {
  $startNo = $halamanAktif - 3;
} else {
  $startNo = 1;
}

if ($halamanAktif < ($jumlahPage - 3)) {
  $endNo = $halamanAktif + 3;
} else {
  $endNo = $jumlahPage;
}

?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Informasi Desa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Informasi Desa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Informasi</h3>
          </div><!-- /.box-header -->

          <div class="box-body">
            <a href="tambah_informasi.php" class="btn bg-olive" style="margin:10px 0;">Tambah</a>

            <!-- Table tdk add table-responsive agar kolom deskripsi tdk memanjang-->
            <div class="" style="overflow-x: scroll;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Penulis</th>
                    <th>Tanggal Upload</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <?php
                $i = $dataAwal+1;
                while ($row = mysqli_fetch_assoc($tampilkanData)) :
                ?>
                  <tbody>
                    <td><?= $i++ ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= $row['penulis'] ?></td>
                    <td><?= $row['uploaded'] ?></td>
                    <td><img src="../img/sapanang/informasi/<?= $row['gambar'] ?>" width="150" alt=""></td>
                    <td>
                      <a href="edit_informasi.php?id=<?= $row['id_informasi'] ?>" class="btn normal bg-primary">Edit</a>
                      <a href="hapus_informasi.php?id=<?= $row['id_informasi'] ?>&no_file=4" onclick="return confirm('Yakin Hapus ?')" class="btn normal bg-maroon">Hapus</a>
                    </td>
                  </tbody>

                <?php endwhile; ?>

              </table>
            </div>
            <!-- End Table -->

            <!-- PAGINATION -->
            <ul class="pagination">
              <?php if ($halamanAktif > 1) : ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">Previous</a></li>
              <?php endif; ?>

              <?php for ($i = $startNo; $i <= $endNo; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                  <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php else : ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if ($halamanAktif < $jumlahPage) : ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a></li>
              <?php endif; ?>
            </ul>
            <!-- END PAGINATION -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require 'template/footer.php' ?>