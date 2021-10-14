<?php
include('koneksi.php');

	$id_det_kls = $_POST['id_det_kls'];
	$id_kls = $_POST['id_kls'];
	$nis = $_POST['nis'];
	$id_thn = $_POST['id_thn'];

	$sql = mysqli_query($conn,"UPDATE det_kls SET id_kls = '$id_kls', nis = '$nis', id_thn = '$id_thn' WHERE id_det_kls = '$id_det_kls'")or die(mysql_error());	
	if ($sql){
		header('location:kelas.php');	
} else {
	echo "gagal!";
    }


?>