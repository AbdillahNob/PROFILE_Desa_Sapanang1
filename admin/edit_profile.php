<?php require 'template/header.php'; 
require '../function/function.php';

$id_profil = $_GET['id'];
// query untuk value data   
$query_profile = view("SELECT * FROM tb_profil WHERE id_profil = $id_profil");

if (isset($_POST['submit'])) {
  $no_file = $_POST['no_file'];

  if(update($_POST,$no_file)>0){
    echo  "<script>
              setTimeout(function () {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Edit Profile',
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

} else{
    echo  "<script>
              setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Tidak ada perubahan Profile',
                    icon: 'warning',
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

          <?php
          // var_dump($rows);
          while ($row = mysqli_fetch_assoc($query_profile)) : ?>

            <form role="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $row['id_profil']; ?>">
              <input type="hidden" name="no_file" value="7">
              <!-- bila foto tdk di perbarui maka foto lama/foto ini ttp di DB -->
              <input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">

              <div class="box-body">

                <div class="form-group">
                  <label for="sejarah">Sejarah</label>
                  <textarea class="form-control" id="sejarah" name="sejarah" rows="6" placeholder="Enter ... " required><?= $row['sejarah'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="detail">Detail Desa</label>
                  <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="Enter ..." required><?= $row['detail'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="gambar">Foto Desa</label>
                  <!-- apabila foto di perbarui maka NAME ini yg akan di PROSES -->
                  <input type="file" style="margin-bottom: 20px;" id="gambar" name="gambar" placeholder="Enter ...">
                  <img src="../img/sapanang/Profile_desa/<?= $row['gambar'] ?>" width="150" alt="" style="border: 1px solid black;">
                </div>

                <div class="form-group">
                  <label for="visi">Visi</label>
                  <textarea class="form-control" id="visi" name="visi" rows="2" placeholder="Enter ..." required><?= $row['visi'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="misi">Misi</label>
                  <textarea class="form-control" id="misi" name="misi" rows="3" placeholder="Enter ..." required><?= $row['misi'] ?></textarea>
                </div>

              </div><!-- /.box-body -->

            <?php endwhile; ?>

            <div class="box-footer">
              <button type="submit" name='submit' class="btn btn-primary" id="simpan">Simpan Perubahan</button>
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
<!-- <script type="text/javascript" src="/js/sweetalert.min.js"></script> -->
<?php require 'template/footer.php' ?>