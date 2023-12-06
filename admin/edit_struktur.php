<?php 
    require 'template/header.php'; 
    require '../function/function.php';

    $id = $_GET['id'];
    $query_login = view("SELECT * FROM tb_struktur WHERE id_struktur = $id");

    if (isset($_POST['submit'])) {
        
        $no_file = $_POST['no_file'];
        // var_dump(update($_POST, $no_file));
        if (update($_POST, $no_file) > 0) {
            echo 
                "<script>
                    setTimeout(function () {
                      Swal.fire({
                          title: 'Berhasil',
                          text: 'Berhasil Edit Struktur',
                          icon: 'success',
                          timer: '3200',
                          showConfirmButton: false
                      });
                  },10);
                  window.setTimeout(function(){
                      window.location.replace('struktur.php');
                  },3000);
                </script>";
        }
        else {
            // var_dump(update($_POST, $no_file));   

            echo 
                "<script>
                    setTimeout(function () {
                      Swal.fire({
                          title: 'INFO',
                          text: 'Tidak ada perubahan Struktur',
                          icon: 'warning',
                          timer: '3200',
                          showConfirmButton: false
                      });
                  },10);
                  window.setTimeout(function(){
                      window.location.replace('struktur.php');
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
            Struktur
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Edit Struktur Desa</li>
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
                  <h3 class="box-title">Data Struktur</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                
                while($row = mysqli_fetch_assoc($query_login)) : 
                    
                ?>
                
                <form role="form" action="" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="id" value="<?= $row['id_struktur'] ?>">                
                  <input type="hidden" name="no_file" value="5">
                  <input type="hidden" name="gambarLama" value="<?= $row['gambar'] ?>">

                  <div class="box-body">

                    <div class="form-group">
                      <label>Nama </label>
                      <input class="form-control" id="nama" name="nama" rows="6" placeholder="Enter ..." value="<?= $row['nama'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Jabatan </label>
                      <input type="text" class="form-control" id="jabatan" name="jabatan" rows="6" placeholder="Enter ..." value="<?= $row['jabatan'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" style="margin-bottom: 20px;" id="gambar" name="gambar" placeholder="Enter ..."> 
                      <img style ="border: 1px solid black;"  src="../img/sapanang/struktur/<?= $row['gambar'] ?>" width="250" alt="">

                    </div>

                  </div><!-- /.box-body -->

                  <?php endwhile; ?>

                  <div class="box-footer">
                    <button type="submit" name='submit' class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form>
              </div><!-- /.box -->


            </div><!--/.col (left) -->
           
          </div>   <!-- /.row -->
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