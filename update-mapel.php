<?php
include('koneksi.php');

		$id_mapel  = $_POST['id_mapel'];
		$nm_mapel  = $_POST['nm_mapel'];

$query = mysqli_query($conn,"UPDATE mapelj SET  nm_mapel='$nm_mapel' WHERE id_mapel='$id_mapel'")or die(mysql_error());

if ($query)
{header('location:mapel.php');	
} else {
	echo "gagal";
    }
?>