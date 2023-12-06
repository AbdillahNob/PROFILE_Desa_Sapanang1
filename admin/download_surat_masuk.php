<?php 
require '../function/function.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_surat_masuk WHERE id_surat_masuk = $id");
$data = mysqli_fetch_assoc($result);

// header yang menunjukkan nama file yang akan didownload
header("Content-Disposition: attachment; filename=".$data['file']);

 // proses membaca isi file yang akan didownload dari folder 'data'
 $fp  = fopen("../img/sapanang/surat_masuk/".$data['file'], 'r');
 $content = fread($fp, filesize('../img/sapanang/surat_masuk/'.$data['file']));
 fclose($fp);

 // menampilkan isi file yang akan didownload
 echo $content;

 exit;


?>