<?php
require 'template/header.php';
require '../function/function.php';

$id_kk = $_GET['id'];
$query_kk = view("SELECT * FROM tb_kk WHERE id_kk = $id_kk");

if (isset($_POST['submit'])) {

  $no_file = $_POST['no_file'];

  if (update($_POST, $no_file) > 0) {

    echo
        "<script>
            setTimeout(function () {
              Swal.fire({
                  title: 'Berhasil',
                  text: 'Berhasil Edit Penduduk',
                  icon: 'success',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('k_penduduk.php');
          },3000);
        </script>";
  } else {
    // var_dump($no_file);
    echo 
        "<script>
            setTimeout(function () {
              Swal.fire({
                  title: 'INFO',
                  text: 'Tidak ada perubahan Penduduk',
                  icon: 'warning',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('k_penduduk.php');
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
      Data Penduduk
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Tambah Penduduk Desa</li>
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
            <h3 class="box-title">Data Penduduk</h3>
          </div><!-- /.box-header -->

          <?php
          while ($row = mysqli_fetch_assoc($query_kk)) :
          ?>
            <!-- form start -->

            <form role="form" action="" method="post">
              <input type="hidden" name="id" value="<?= $id_kk ?>">
              <input type="hidden" name="no_file" value="2">

              <div class="box-body">
                <!-- nik -->
                <div class="form-group">
                  <label for="no_kk">Nomor KK </label>
                  <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Enter ..." value="<?= $row['no_kk'] ?>" required>
                </div>

                <!-- nik -->
                <div class="form-group">
                  <label for="nik">Nik </label>
                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Enter ..." value="<?= $row['nik'] ?>" required>
                </div>

                <!-- nama -->
                <div class="form-group">
                  <label for="nama">Nama </label>
                  <input type="text" class="form-control" id="nama" name="nama" rows="6" placeholder="Enter ..." value="<?= $row['nama'] ?>" required>
                </div>

                <!-- tempat lahir -->
                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter ..." value="<?= $row['tempat_lahir'] ?> " required>

                </div>
                <!-- tanggal lahir -->
                <div class="form-group">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Enter ..." value="<?= $row['tgl_lahir'] ?>">
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group">
                  <label>Jenis Kelamin : </label> <?= $row['jns_kelamin'] ?>
                  <input type="hidden" name="jns_kelamin" value="<?= $row['jns_kelamin'] ?>">
                  <br>

                  <input type="radio" id="pria" name="jns_kelamin" value="Pria">
                  <label for="pria">Pria</label>

                  <input type="radio" id="wanita" name="jns_kelamin" value="Wanita">
                  <label for="wanita">Wanita</label>
                </div>
                <!-- end jenis kelamin -->

                <!-- Hubungan dalam Keluarga -->
                <div class="form-group">
                  <label>Hubungan dalam keluarga : </label> <?= $row['hubungan_dlm_keluarga'] ?>
                  <input type="hidden" name="hubungan_dlm_keluarga" value="<?= $row['hubungan_dlm_keluarga'] ?>">
                  <br>

                  <input type="radio" id="kepala_keluarga" name="hubungan_dlm_keluarga" value="Kepala Keluarga">
                  <label for="kepala_keluarga">Kepala Keluarga </label>

                  <input type="radio" id="suami" name="hubungan_dlm_keluarga" value="Suami">
                  <label for="suami">Suami</label><br><br>

                  <input type="radio" id="istri" name="hubungan_dlm_keluarga" value="Istri">
                  <label for="istri">Istri</label>

                  <input type="radio" id="anak" name="hubungan_dlm_keluarga" value="Anak">
                  <label for="anak">Anak</label><br><br>

                  <input type="radio" id="menantu" name="hubungan_dlm_keluarga" value="Menantu">
                  <label for="menantu">Menantu</label>

                  <input type="radio" id="mertua" name="hubungan_dlm_keluarga" value="Mertua">
                  <label for="mertua">Mertua</label><br><br>

                  <input type="radio" id="orang_tua" name="hubungan_dlm_keluarga" value="Orang Tua">
                  <label for="orang_tua">Orang Tua</label>

                  <input type="radio" id="cucu" name="hubungan_dlm_keluarga" value="Cucu">
                  <label for="cucu">Cucu</label>

                </div>
                <!-- nama keluarga -->
                <div class="form-group">
                  <label for="nama_keluarga">Nama Keluarga</label>
                  <input type="text" required class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Enter ..." value="<?= $row['nama_keluarga'] ?>">
                </div>

                <!-- Agama -->
                <div class="form-group">
                  <label>Agama : </label> <?= $row['agama'] ?>
                  <input type="hidden" name="agama" value="<?= $row['agama'] ?>">
                  <br>

                  <input type="radio" id="islam" name="agama" value="Islam">
                  <label for="islam">Islam </label>

                  <input type="radio" id="kristen" name="agama" value="Kristen">
                  <label for="Kristen">Kristen </label><br><br>

                  <input type="radio" id="katholik" name="agama" value="Katholik">
                  <label for="katholik">Katholik </label>

                  <input type="radio" id="hindu" name="agama" value="Hindu">
                  <label for="hindu">Hindu </label><br><br>

                  <input type="radio" id="lainnya" name="agama" value="Lainnya">
                  <label for="lainnya">Lainnya </label>
                </div>

                <!-- pendidikan -->
                <div class="form-group">
                  <label for="pendidikan">Pendidikan</label>
                  <input type="text" required class="form-control" id="pendidikan" name="pendidikan" placeholder="Enter ..." value="<?= $row['pendidikan'] ?>">
                </div>

                <!-- pekerjaan -->
                <div class="form-group">
                  <label for="pekerjaan">Jenis Pekerjaan</label>
                  <input type="text" required class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Enter ..." value="<?= $row['pekerjaan'] ?>">
                </div>

                <!-- Golongan darah -->
                <div class="form-group">
                  <label>Golongan Darah : </label> <?= $row['darah'] ?>
                  <input type="hidden" name="darah" value="<?= $row['darah'] ?>">
                  <br>

                  <input type="radio" id="A" name="darah" value="A">
                  <label for="A">A </label>

                  <input type="radio" id="B" name="darah" value="B">
                  <label for="B">B </label><br><br>

                  <input type="radio" id="AB" name="darah" value="AB">
                  <label for="AB">AB </label>

                  <input type="radio" id="O" name="darah" value="O">
                  <label for="O">O </label><br><br>

                  <input type="radio" id="-" name="darah" value="-">
                  <label for="-">-</label>
                </div>

                <!-- Dusun -->
                <div class="form-group">
                  <label>Dusun : </label> <?= $row['dusun'] ?>
                  <input type="hidden" name="dusun" value="<?= $row['dusun'] ?>">
                  <br>

                  <input type="radio" id="sapiri" name="dusun" value="Sapiri">
                  <label for="sapiri">Sapiri </label>

                  <input type="radio" id="gandi" name="dusun" value="Gandi">
                  <label for="gandi">Gandi </label><br><br>

                  <input type="radio" id="sapanang" name="dusun" value="Sapanang">
                  <label for="sapanang">Sapanang </label>

                  <input type="radio" id="bantaulu" name="dusun" value="Bantaulu">
                  <label for="bantaulu">Bantaulu </label><br><br>

                  <input type="radio" id="sarroanging" name="dusun" value="Sarroanging">
                  <label for="sarroanging">Sarroanging </label>

                  <input type="radio" id="kanea" name="dusun" value="Kanea">
                  <label for="kanea">Kanea </label>

                </div>

              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name='submit' class="btn btn-primary">Simpan</button>
              </div>
            </form>
          <?php endwhile ?>
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