<?php
    require '../function/function.php';
    require 'template/header.php';
    
    $id = $_GET['id'];
    $no_file = $_GET['no_file'];
    // var_dump($_GET);
    $query = hapus($id, $no_file);

    if($query != null) {
        echo
            "<script>
                setTimeout(function () {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Menghapus Informasi',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
                },10);
                window.setTimeout(function(){
                    window.location.replace('informasi.php');
                },3000);
            </script>"; 
    }
    else {
        echo 
            "<script>
                setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Gagal Menghapus Informasi',
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
?>