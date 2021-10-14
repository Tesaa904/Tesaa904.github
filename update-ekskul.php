<?php
include('koneksi.php');
$id_ektra = $_POST['id_ektra'];
$nm_ektra   = $_POST['nm_ektra'];



$query = mysqli_query($conn,"UPDATE eksktra SET nm_ektra='$nm_ektra' WHERE id_ektra='$id_ektra'") or die(mysql_error());
if ($query){
header('location:ekskul.php');	
} else {
	echo "gagal";
    }
?>