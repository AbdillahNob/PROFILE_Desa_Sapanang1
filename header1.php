<?php
session_start();

// jika belum log-out kembali ke halaman sebelumnya.
if(isset($_SESSION['hal'])){
    header("location:admin/super_dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Desa Sapanang</title>

    <meta name="description" content="sapanang">
    <meta name="keywords" content="">
    <meta name="author" content="tabthemes">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/sapanang/jeneponto.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/sapanang/jeneponto_02.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/sapanang/jeneponto_03.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/sapanang/jeneponto_04.png">
    

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Files For Plugin -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/YTPlayer.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="blog_index" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">


    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->


    <!-- Start Navigation -->
    <header class="nav-solid" id="home">

        <nav class="navbar navbar-fixed-top">
            <div class="navigation">
                <div class="container-fluid">
                    <div class="row">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Logo -->
                            <div class="logo-container">
                                <div class="logo-wrap local-scroll">
                                    <a href="index.php">
                                        <img class="logo" src="img/sapanang/logo_jeneponto.png" alt="" data-rjs="2">
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end navbar-header -->

                        <div class="col-md-8 col-xs-12 nav-wrap">
                            <div class="collapse navbar-collapse" id="navbar-collapse">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php">Beranda</a></li>
                                    <li><a href="produk_desa.php">Produk Desa</a></li>
                                    <li><a href="informasi.php">Informasi</a></li>
                                    <li class="nav item-dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tentang Desa
                                            <span class="caret"></span>
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color:dimgray" role="menu">
                                            <a class="dropdown-item" href="tentang_desa.php">Profile desa</a>
                                            <a class="dropdown-item" href="struktur_desa.php">Struktur</a>
                                            <a class="dropdown-item" href="pendidikan.php">Pendidikan</a>
                                            </div>
                                    </li>
                                    <li><a href="admin/login.php">Login</a></li>
                                </ul>

                            </div>
                        </div> <!-- /.col -->

                    </div> <!-- /.row -->
                </div>
                <!--/.container -->
            </div> <!-- /.navigation-overlay -->
        </nav> <!-- /.navbar -->

    </header>
    <!-- End Navigation -->