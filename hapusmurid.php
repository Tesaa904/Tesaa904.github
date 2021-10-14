<?php
include ('koneksi.php');
$nis = $_GET['nis'];

$query = mysqli_query($conn,"DELETE FROM murid WHERE nis='$nis'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'murid1.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'murid1.php'</script>";	
}
?>