<?php
include ('koneksi.php');
$id_det_kls = $_GET['kd'];


$query = mysqli_query($conn,"DELETE FROM det_kls WHERE id_det_kls='$id_det_kls'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kelas.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kelas.php'</script>";	
}
?>