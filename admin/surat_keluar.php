<?php
require 'template/header.php';
require '../function/function.php';

$query_persuratan = view("SELECT * FROM tb_surat_keluar");

$dataPerhalaman = 6;
$totalData = mysqli_num_rows($query_persuratan);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_surat_keluar LIMIT $dataAwal,$dataPerhalaman");

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
      Data Persuratan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Surat Masuk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Surat Keluar</h3>
          </div><!-- /.box-header -->
          <div class="box-body">

            <a href="tambah_surat_keluar.php" class="btn bg-olive" style="margin:10px 0;">Tambah</a>
            <!-- Table -->
            <div class="table-responsive text-nowrap" style="overflow-x: scroll;">
              <table id="example2" class="table table-bordered table-hover table-striped">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Asal Surat</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Surat di Terima</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <?php $i = $dataAwal+1;
                while ($row = mysqli_fetch_array($tampilkanData)) : ?>
                  <tbody>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $row['no_surat'] ?></td>
                      <td><?= $row['asal_surat'] ?></td>
                      <td><?= $row['perihal'] ?></td>
                      <td><?= $row['tgl_surat'] ?></td>
                      <td><?= $row['tgl_surat_diterima'] ?></td>
                      <td>
                        <a href="download_surat_keluar.php?id=<?= $row['id_surat_keluar'] ?>" class="btn normal bg-olive">Download</a>
                        <a href="edit_surat_keluar.php?id=<?= $row['id_surat_keluar'] ?>" class="btn normal bg-primary">Edit</a>
                        <a href="hapus_surat_keluar.php?id=<?= $row['id_surat_keluar'] ?>&no_file=9" onclick="return confirm('Yakin hapus ?')" class="btn normal bg-maroon">Hapus</a>
                      </td>
                    </tr>

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