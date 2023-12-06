<?php 
require '../function/function.php';
require 'template/header.php';

$id_kk = $_GET['id'];
$no_file = $_GET['no_file'];

if( hapus($id_kk, $no_file) > 0 ){
    echo
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Menghapus Penduduk',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('k_penduduk.php');
            },3000);
        </script>"; 
}
else{
    echo 
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'INFO',
                text: 'Gagal Menghapus Penduduk',
                icon: 'error',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('k_penduduk.php');
            },2000);
        </script>";
}

?>