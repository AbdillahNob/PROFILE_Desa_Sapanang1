<?php
require 'template/header.php';
require '../function/function.php';

$query_kk = view("SELECT * FROM tb_kk");

$dataPerhalaman = 10;
$totalData = mysqli_num_rows($query_kk);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_kk LIMIT $dataAwal,$dataPerhalaman");

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

            <a href="tambah_penduduk.php" class="btn bg-olive" style="margin:10px 0;">Tambah</a>
            <!-- overflow-x: scroll = utk membuat scroll -->
            <!-- text-nowrap = agr value didlm table memanjang horizontol -->
            <div class="table-responsive text-nowrap" style="overflow-x: scroll">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor KK</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Hubungan dalam Keluarga</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Golongan Darah</th>
                    <th>Nama Keluarga</th>
                    <th>Dusun</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <?php
                $i = $dataAwal+1;
                while ($row = mysqli_fetch_assoc($tampilkanData)) :

                ?>
                  <tbody>
                    <td><?= $i++ ?></td>
                    <td><?= $row['no_kk'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['tempat_lahir'] ?></td>
                    <td><?= $row['tgl_lahir'] ?></td>
                    <td><?= $row['jns_kelamin'] ?></td>
                    <td><?= $row['hubungan_dlm_keluarga'] ?></td>
                    <td><?= $row['agama'] ?></td>
                    <td><?= $row['pendidikan'] ?></td>
                    <td><?= $row['pekerjaan'] ?></td>
                    <td align="center"><?= $row['darah'] ?></td>
                    <td><?= $row['nama_keluarga'] ?></td>
                    <td><?= $row['dusun'] ?></td>
                    <td>
                      <a href="edit_penduduk.php?id=<?= $row['id_kk'] ?>" class="btn normal bg-primary">Edit</a>
                      <a href="hapus_penduduk.php?id=<?= $row['id_kk'] ?>&no_file=2" onclick="return confirm('Yakin hapus ?')" class="btn normal bg-maroon">Hapus</a>
                    </td>
                  </tbody>

                <?php endwhile; ?>

              </table>
            </div>
            
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