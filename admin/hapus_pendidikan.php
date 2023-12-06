<?php 
require '../function/function.php';
require 'template/header.php';

$id = $_GET['id'] ;
$no_files = $_GET['no_file'];

if(hapus($id, $no_files) > 0){
    echo
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Menghapus Pendidikan',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('pendidikan.php');
            },3000);
        </script>"; 
}
else{
    echo 
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'INFO',
                text: 'Gagal Menghapus Pendidikan',
                icon: 'error',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('pendidikan.php');
            },2000);
        </script>";
}


?>