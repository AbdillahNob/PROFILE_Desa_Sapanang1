<?php require 'template/header.php' ?>

<?php

require '../function/function.php';


if (isset($_POST['submit'])) {
  $no_file = $_POST['no_file'];

  if (insert($_POST, $no_file) > 0) {
    echo "
          <script>
            setTimeout(function () {
              Swal.fire({
                  title: 'Berhasil',
                  text: 'Berhasil Tambah Profile',
                  icon: 'success',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('profile.php');
          },3000);
          </script>"
          ;
  }else{
    echo "
          <script>
            setTimeout(function () {
              Swal.fire({
                  title: 'INFO',
                  text: 'Gagal Tambah Profil',
                  icon: 'error',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('profile.php');
          },2000);
          </script>"
          ;
  }

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
      <li class="active">Edit Profile Desa</li>
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
            <h3 class="box-title">Data Profile</h3>
          </div><!-- /.box-header -->
          <!-- form start -->

            <form role="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="no_file" value="7">
              <div class="box-body">

                <div class="form-group">
                  <label for="sejarah">Sejarah</label>
                  <textarea required class="form-control" id="sejarah" name="sejarah" rows="6" placeholder="Enter ..."></textarea>
                </div>

                <div class="form-group">
                  <label for="detail">Detail Desa</label>
                  <textarea required class="form-control" id="detail" name="detail" rows="3" placeholder="Enter ..."></textarea>
                </div>

                <div class="form-group">
                  <label for="gambar">Foto Desa</label>
                  <input required type="file" style="margin-bottom: 20px;" id="gambar" name="gambar" placeholder="Enter ...">
                  
                </div>

                <div class="form-group">
                  <label for="visi">Visi</label>
                  <textarea required class="form-control" id="visi" name="visi" rows="2" placeholder="Enter ..."></textarea>
                </div>

                <div class="form-group">
                  <label for="misi">Misi</label>
                  <textarea required class="form-control" id="misi" name="misi" rows="3" placeholder="Enter ..."></textarea>
                </div>

              </div><!-- /.box-body -->

            <div class="box-footer">
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
  CKEDITOR.replace('detail');
  CKEDITOR.replace('struktural');
  CKEDITOR.replace('visi');
  CKEDITOR.replace('misi');
</script>
<?php require 'template/footer.php' ?>