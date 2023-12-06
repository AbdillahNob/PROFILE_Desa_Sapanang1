<?php
// require '../../function/function.php';
session_start();
// tdk bisa akses halaman ini jika belum login !
if (!isset($_SESSION['hal'])) {
  echo "
  <script>
    window.location.replace('login.php');
  </script>
  ";
  exit;
}

// tdk bisa di hubungkan ke function karena directory nya tdk di temukan.
$id_login = $_SESSION['level'];
$conn = mysqli_connect("localhost", "u280662939_desa_sapanang", "LuKMAn09", "u280662939_desa_sapanang");
$result = mysqli_query($conn, "SELECT * FROM tb_login WHERE id_login = $id_login");
$rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Desa Sapanang | Dashboard</title>

  <meta name="description" content="Desa Sapanang">
  <meta name="keywords" content="">
  <meta name="author" content="tabthemes">

  <!-- Favicons -->
  <link rel="shortcut icon" href="../img/sapanang/jeneponto.png">
  <link rel="apple-touch-icon" sizes="57x57" href="../img/sapanang/jeneponto_02.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../img/sapanang/jeneponto_03.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../img/sapanang/jeneponto_04.png">

  <meta content='width=device-width, initial-scale=2, maximum-scale=2, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- Date Picker -->
  <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

  <!-- SWEETALLERT -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- <link href="/css/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo"><b>Sapanang|</b>Dashboard</a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                <span class="hidden-xs"><?= $rows['nama']; ?> | Desa Sapanang</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <?php if ($_SESSION['level'] == 1) : ?>
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Admin | Desa Sapanang
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                <?php else : ?>
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      User | Desa Sapanang
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                <?php endif ?>

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="log_out.php" class="btn btn-default btn-flat" onclick="return confirm('Yakin mau keluar ?')">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found  in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <?php if ($_SESSION['level'] == 1) : ?>
              <p>Admin | Desa Sapanang</p>
            <?php else : ?>
              <p>User | Desa Sapanang</p>
            <?php endif ?>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">DASHBOARD DESA SAPANANG</li>
          <li class="active treeview">

          <li class="active"><a href="super_dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

          </li>

          <li class="treeview">
            <?php if ($_SESSION['level'] == 1) { ?>
          <li><a href="user.php"><i class="fa  fa-user"></i> User Desa</a></li>
          <li><a href="profile.php"><i class="fa fa-file-text-o"></i> Profile Desa</a></li>
          <li><a href="struktur.php"><i class="fa fa-group"></i> struktur Desa</a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span>Pengarsipan Surat</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href="surat_masuk.php"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
              <li><a href="surat_keluar.php"><i class="fa fa-circle-o"></i>Surat Keluar</a></li>
            </ul>
          </li>

          <li><a href="k_penduduk.php"><i class="fa fa-group"></i> Kelola Penduduk</a></li>
        <?php } ?>
        <li><a href="produk.php"><i class="fa fa-cutlery"></i> Produk Desa</a></li>
        <li><a href="cari_penduduk.php"><i class="fa fa-search"></i> Cari Penduduk</a></li>
        <li><a href="pendidikan.php"><i class="fa fa-graduation-cap"></i> Pendidikan</a></li>
        <li><a href="informasi.php"><i class="fa fa-file-text-o"></i> Informasi Desa</a></li>

        </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>