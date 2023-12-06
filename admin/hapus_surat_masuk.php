<?php 
require '../function/function.php';
require 'template/header.php';

$id = $_GET['id'];
$no_file = $_GET['no_file'];

if( hapus($id, $no_file) > 0 ){
    echo
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Hapus Arsip Surat Masuk',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('surat_masuk.php');
            },3000);
        </script>"; 

}
else{
    echo 
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'INFO',
                text: 'Gagal Hapus Arsip Surat Masuk',
                icon: 'error',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('surat_masuk.php');
            },2000);
        </script>";
}

?>