<?php 
session_start();

$_SESSION=[];
session_destroy();
session_unset();

setcookie("id", "", time()-1);
setcookie("key", "", time()-1);
header("location:login.php");

?>