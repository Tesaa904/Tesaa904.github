<?php
include ('koneksi.php');
$thn = $_GET['thn'];

$query = mysqli_query($conn,"DELETE FROM  thnajar WHERE thn='$thn'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'thn.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'thn.php'</script>";	
}
?>