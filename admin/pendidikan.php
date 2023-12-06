<?php
require 'template/header.php';
require '../function/function.php';

$query_pendidikan = view("SELECT * FROM tb_pendidikan");

$dataPerhalaman = 3;
$totalData = mysqli_num_rows($query_pendidikan);
$jumlahPage = ceil($totalData / $dataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$dataAwal = ($halamanAktif * $dataPerhalaman) - $dataPerhalaman;

$tampilkanData = view("SELECT * FROM tb_pendidikan LIMIT $dataAwal,$dataPerhalaman");

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
            Pendidikan Desa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Pendidikan Desa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data pendidikan</h3>
                    </div><!-- /.box-header -->


                    <div class="box-body">
                        <a href="tambah_pendidikan.php" class="btn bg-olive" style="margin:10px 0;">Tambah</a>
                        <!-- text-nowrap = agr table memanjang ke samping di mode DESKTOP, overflow-x: scroll = utk membuat scroll horizontol -->
                        <!-- Table tdk add table-responsive agar kolom deskripsi tdk memanjang-->
                        <div class="table-responsive" style="overflow-x: scroll">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Sekolah</th>
                                        <th>Alamat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>

                                <?php
                                $i = $dataAwal+1;
                                while ($row = mysqli_fetch_assoc($tampilkanData)) :
                                ?>
                                    <tbody>
                                        <td><?= $i++ ?></td>
                                        <td><img src="../img/sapanang/pendidikan/<?= $row['gambar'] ?>" height="150" width="200" ></td>
                                        <td><?= $row['nama_sekolah'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['deskripsi'] ?></td>
                                        <td>
                                            <a href="edit_pendidikan.php?id=<?= $row['id_pendidikan'] ?>" class="btn normal bg-primary">Edit</a>
                                            <a href="hapus_pendidikan.php?id=<?= $row['id_pendidikan'] ?>&no_file=6" onclick="return confirm('Yakin hapus ?')" class="btn normal bg-maroon">Hapus</a>
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