<?php
$db_host = "sinkanismur.000webhostapp.com";
$db_user = "id8751813_emma";
$db_pass = "240696";
$db_name = "id8751813_nilaisd";
 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
