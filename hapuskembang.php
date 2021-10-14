<?php
include ('koneksi.php');
$id_kem = $_GET['kem'];


$query = mysqli_query($conn,"DELETE FROM perkem WHERE id_kem='$id_kem'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kembang.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kembang.php'</script>";	
}
?>