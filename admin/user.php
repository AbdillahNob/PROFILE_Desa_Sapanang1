<?php
require 'template/header.php';
require '../function/function.php';
// session_start();

$query_login = view("SELECT * FROM tb_login");

$dataPerhalaman = 3;
$totalData = mysqli_num_rows($query_login);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_login LIMIT $dataAwal,$dataPerhalaman");

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
      Data User
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data User</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="tambah_user.php" class="btn  btn-success">+ Tambah</a>

            <!-- text-nowrap = agr table memanjang ke samping di mode DESKTOP, overflow-x: scroll = utk membuat scroll horizontol -->
            <!-- Table -->
            <div class="table-responsive text-nowrap" style="overflow-x: scroll">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <?php $i = $dataAwal + 1;
                while ($row = mysqli_fetch_assoc($tampilkanData)) :
                ?>
                  <tbody>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td>
                        <img src="../img/profile/<?= $row['gambar'] ?>" height="150" width="200">
                      </td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['username'] ?></td>
                      <td><?= $row['password'] ?></td>

                      <td>
                        <a href="edit_user.php?id=<?= $row['id_login'] ?>" class="btn normal bg-primary">Edit</a>
                        
                        <?php if ($row['id_login'] != 1){?>
                          <a href="hapus_user.php?id=<?= $row['id_login'] ?>&no_file=1" onclick="return confirm('Yakin Hapus ?')" id="btn-hapus" class="btn normal bg-maroon">Hapus</a>
                        <?php }?>

                      </td>
                    </tr>

                  </tbody>
                <?php endwhile; ?>
            </div>
            <!-- End table -->

            </table>
          </div><!-- /.box-body -->

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

        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Sweet Alert
<script>
  $(document).on('click', '#btn-hapus', function(e) {
    // agr apabila hapus diklik tdk langsung menuju ke link HAPUS
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda Yakin ?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      denyButtonText: `Cancel`,
    }).then((result) => {
      // Apabila tombol Hapus di klik
      if (result.isConfirmed) {
        window.location = link;
      }

    })
  })
</script> -->
<?php require 'template/footer.php' ?>