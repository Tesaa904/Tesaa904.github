<?php
include ('koneksi.php');
$id_wali = $_GET['kd'];

$query = mysqli_query($conn,"DELETE FROM wali_kls WHERE id_wali='$id_wali'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'walikelas.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'walikelas.php'</script>";	
}
?>