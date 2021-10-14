<?php
include ('koneksi.php');
$id_aturan = $_GET['kd'];

$query = mysqli_query($conn,"DELETE FROM aturan WHERE id_aturan='$id_aturan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'KD.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'KD.php'</script>";	
}
?>