<?php require 'template/header.php';
require '../function/function.php';

$query_profile = view("SELECT * FROM tb_profil");

$dataPerhalaman = 2;
$totalData = mysqli_num_rows($query_profile);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_profil LIMIT $dataAwal,$dataPerhalaman");

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
      Profile Desa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Profile Desa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Profile</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="tambah_profile.php" class="btn bg-olive" style="margin:10px 0;">Tambah</a>

            <!-- text-nowrap = agr table memanjang ke samping di mode DESKTOP, overflow-x: scroll = utk membuat scroll horizontol -->
            <!-- Table -->
            <div class="table-responsive" style="overflow-x: scroll;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Sejarah</th>
                    <th>Detail </th>
                    <th>Foto Desa</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <?php
                $i = $dataAwal + 1;
                while ($row = mysqli_fetch_assoc($tampilkanData)) : ?>
                  <tbody>
                    <td><?= $i++ ?></td>
                    <td><?= $row['sejarah'] ?></td>
                    <td><?= $row['detail'] ?></td>
                    <td><img src="../img/sapanang/Profile_desa/<?= $row['gambar'] ?>" width="200"></td>
                    <td><?= $row['visi'] ?></td>
                    <td><?= $row['misi'] ?></td>
                    <td>
                      <a href="edit_profile.php?id=<?= $row['id_profil'] ?>" class="btn normal bg-primary">Edit</a>

                      <?php if($row['id_profil'] != 1){ ?>
                        <a href="hapus_profile.php?id=<?= $row['id_profil'] ?>&no_file=7"  onclick="return confirm('Yakin Hapus ?')" id="hapus" class="btn normal bg-maroon">Hapus</a>
                      <?php } ?>
                      
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

            <!-- end table -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require 'template/footer.php' ?>