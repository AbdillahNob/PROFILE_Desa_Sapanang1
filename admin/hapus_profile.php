<?php 
require '../function/function.php';
require 'template/header.php';

$no_file = $_GET['no_file'];
$id = $_GET['id'];

if(hapus($id, $no_file)>0){
    echo
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Menghapus Profile',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('profile.php');
            },3000);
        </script>"; 
       
}else
    {
    echo 
        "<script>
            setTimeout(function () {
            Swal.fire({
                title: 'INFO',
                text: 'Gagal Menghapus Profile',
                icon: 'error',
                timer: '3200',
                showConfirmButton: false
            });
            },10);
            window.setTimeout(function(){
                window.location.replace('profile.php');
            },2000);
        </script>"; 
}

?>