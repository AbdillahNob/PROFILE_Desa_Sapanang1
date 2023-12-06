<?php
require 'template/header.php';
require '../function/function.php';

$id = $_GET['id'];
$query_informasi = view("SELECT * FROM tb_pendidikan WHERE id_pendidikan = $id");

if (isset($_POST['submit'])) {

    $no_file = $_POST['no_file'];

    if (update($_POST, $no_file) > 0) {
        echo 
            "<script>
                setTimeout(function () {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Berhasil Edit Pendidikan',
                        icon: 'success',
                        timer: '3200',
                        showConfirmButton: false
                    });
                },10);
                window.setTimeout(function(){
                    window.location.replace('pendidikan.php');
                },3000);
            </script>";
    } else {
        // var_dump(update($_POST, $no_file));   

        echo 
            "<script>
                setTimeout(function () {
                    Swal.fire({
                        title: 'INFO',
                        text: 'Tidak ada perubahan Pendidikan',
                        icon: 'warning',
                        timer: '3200',
                        showConfirmButton: false
                    });
                },10);
                window.setTimeout(function(){
                    window.location.replace('pendidikan.php');
                },2000);
            </script>";
    }
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
            <li class="active">Edit Pendidikan Desa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Pendidikan</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php

                    while ($row = mysqli_fetch_assoc($query_informasi)) :

                    ?>

                        <form role="form" action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $row['id_pendidikan'] ?>">
                            <input type="hidden" name="no_file" value="6">
                            <input type="hidden" name="gambarLama" value="<?= $row['gambar'] ?>">

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" id="gambar" style="margin-bottom: 20px;" placeholder="Enter ...">
                                    <img style="border: 1px solid black;" src="../img/sapanang/pendidikan/<?= $row['gambar']; ?>" width="250" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="sekolah">Nama Sekolah</label>
                                    <input class="form-control" id="sekolah" name="sekolah" rows="6" placeholder="Enter ..." value="<?= $row['nama_sekolah'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat" rows="6" placeholder="Enter ..." value="<?= $row['alamat']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Enter ..." required><?= $row['deskripsi'] ?></textarea>
                                </div>

                            </div><!-- /.box-body -->

                        <?php endwhile; ?>

                        <div class="box-footer">
                            <button type="submit" name='submit' class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </form>
                </div><!-- /.box -->


            </div><!--/.col (left) -->

        </div> <!-- /.row -->
    </section>

    <!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Plugin CK editor -->
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/styles.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('sejarah');
    CKEDITOR.replace('deskripsi');
    //   CKEDITOR.replace('penulis');
    //   CKEDITOR.replace('uploaded');
    CKEDITOR.replace('misi');
</script>


<?php require 'template/footer.php'; ?>