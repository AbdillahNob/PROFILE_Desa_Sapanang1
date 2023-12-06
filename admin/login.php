<?php
require '../function/function.php';
require '../admin/template/call_sweetAlert.php';
session_start();
// session_unset();


// Apakah Cookie masih ada ?
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $username = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT * FROM tb_Login WHERE id_login = $id");
    $row = mysqli_fetch_assoc($result);

    // validasi apakah cookie yg di tangkap sm dgn id dan username yg ad di DB
    if($username == hash("sha256", $row['username'])){
        $_SESSION['level'] = $row['id_login'];
        $_SESSION['hal'] = true;

    }
}

// jika belum log-out kembali ke halaman sebelumnya.
if(isset($_SESSION['hal'])){
    echo "
        <script>
          window.location.replace('super_dashboard.php');
        </script>
        ";
}

if (isset($_POST['submit'])) {

  $username = $_POST['user'];
  $password = $_POST['pass'];
  // $level = $_POST['level'];

  $query = "SELECT * FROM tb_login WHERE username='$username' ";
  $data = mysqli_query($conn, $query);
  $cek = mysqli_num_rows($data);

  // Validasi AKUN dan Remember me
  if ($cek > 0 ) {
    $validasi = mysqli_fetch_assoc($data);

    // Level = 1 adalah Rute halaman Admin utk akun ADMIN.
    if ($validasi['id_login'] == 1 && password_verify($password, $validasi['password'])) {
      $_SESSION['level'] = $validasi['id_login'];
      $_SESSION['hal'] = true;
     // var_dump($_SESSION['level']);

        // jika Remember klik
      if(isset($_POST['remember'])){ 
        setcookie("id", $validasi['id_login'], time()+60*60*24);
        setcookie("key", hash('sha256', $validasi['username']), time()+60*60*24);
      }
      echo
      "<script>
          setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Login Berhasil',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
        },10);
        window.setTimeout(function(){
            window.location.replace('super_dashboard.php');
        },3000);
      </script>"
      ;
    }
    // ---------End Validasi ADMIN

    // Selain Level = 1, adalah Rute halaman Admin utk akun USER.
    else if (password_verify($password, $validasi['password'])) {
      $_SESSION['level'] = $validasi['id_login'];
      $_SESSION['hal'] = true;

        // jika Remember klik
        if(isset($_POST['remember'])){
        
          setcookie("id", $validasi['id_login'], time()+60*60*24);
          setcookie("key", hash('sha256', $validasi['username']), time()+60*60*24);
        }
          echo
          "<script>
              setTimeout(function () {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Login Berhasil',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('super_dashboard.php');
            },3000);
          </script>"
          ;
    }
    // -------END Validasi USER
    else{
      echo 
        "<script>
            setTimeout(function () {
              Swal.fire({
                  title: 'INFO',
                  text: 'Password anda SALAH !',
                  icon: 'error',
                  timer: '3200',
                  showConfirmButton: false
              });
          },10);
          window.setTimeout(function(){
              window.location.replace('login.php');
          },2000);
      </script>"
      ;
    }

  } 
  else {
    echo 
      "<script>
          setTimeout(function () {
            Swal.fire({
                title: 'INFO',
                text: 'Username anda SALAH !',
                icon: 'error',
                timer: '3200',
                showConfirmButton: false
            });
        },10);
        window.setTimeout(function(){
            window.location.replace('login.php');
        },2000);
    </script>"
    ;
  }
  // END VALIDASI AKUN dan Remember me

}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Desa Sapanang Log in</title>

  <meta name="description" content="Desa Sapanang">
  <meta name="keywords" content="">
  <meta name="author" content="tabthemes">

  <!-- Favicons -->
  <link rel="shortcut icon" href="../img/sapanang/logo_jeneponto.png">
  <link rel="apple-touch-icon" sizes="57x57" href="../img/sapanang/jeneponto_02.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../img/sapanang/jeneponto_03.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../img/sapanang/jeneponto_04.png">

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      -->
</head>

<body class="login-page" style="background-image:url(../img/sapanang/bg.jpg)" >
  <div class="login-box">
    <div class="login-logo text-uppercase">
      <b>Admin</b>| Desa Sapanang
    </div><!-- /.login-logo -->
    <div class="login-box-body rounded">
      <form action="" method="post">


        <div class="form-group has-feedback mt-4">
          <input type="text" class="form-control fs-4 " name="user" placeholder="Username" />
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control fs-4" name="pass" placeholder="Password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <label for="remember">Remember Me</label>
          <input type="radio" class="form-control fs-4" name="remember" id="remember" />
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat fs-3 p-3 my-4">Sign In</button>

      </form>



      <p class="text-center fs-4">Belum punya akun ? <a href="register.php">Register akun </a></p>
      <a href="../index.php"><span class="glyphicon glyphicon-home"></span> Kembali ke Halaman Utama</a>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.3 -->
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>