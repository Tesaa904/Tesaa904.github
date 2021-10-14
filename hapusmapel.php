<?php
include ('koneksi.php');
$id_mapel = $_GET['kd'];

$query = mysqli_query($conn,"DELETE FROM  mapelj WHERE id_mapel='$id_mapel'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'mapel.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'mapel.php'</script>";	
}
?>