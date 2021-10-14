<?php
include ('koneksi.php');
$nm_ektra = $_GET['nm_ektra'];

$query = mysqli_query($conn,"DELETE FROM eksktra WHERE nm_ektra='$nm_ektra'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'ekskul.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'ekskul.php'</script>";	
}
?>