<?php
require 'template/header.php';
require '../function/function.php';

if (isset($_POST['submit'])) {

  $no_file = $_POST['no_file'];
  // var_dump(update($_POST, $no_file));
  if (insert($_POST, $no_file) > 0) {

    echo 
        "<script>
            setTimeout(function () {
              Swal.fire({
                  title: 'Berhasil',
                  text: 'Berhasil Tambah Informasi',
                  icon: 'success',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('informasi.php');
          },3000);
        </script>";
  } else {
    echo 
        "<script>
            setTimeout(function () {
              Swal.fire({
                  title: 'INFO',
                  text: 'Gagal Tambah Informasi',
                  icon: 'error',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('informasi.php');
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
      Informasi Desa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Tambah informasi</li>
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
            <h3 class="box-title">Data Informasi</h3>
          </div><!-- /.box-header -->
          <!-- form start -->

          <form role="form" action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="no_file" value="4">

            <div class="box-body">

              <div class="form-group">
                <label for="judul">Judul</label>
                <input class="form-control" id="judul" name="judul" rows="6" placeholder="Enter ...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter ..."></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" rows="3" placeholder="Enter ...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Upload</label>
                <input type="date" class="form-control" id="uploaded" name="uploaded" placeholder="Enter ...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input type="file" required class="form-control" id="gambar" name="gambar" placeholder="Enter ..."> 
                    </div>

                  </div><!-- /.box-body -->

                  <div class=" box-footer">
                <button type="submit" name='submit' class="btn btn-primary">Simpan</button>
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