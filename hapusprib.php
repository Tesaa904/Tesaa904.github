 <?php
include ('koneksi.php');
$id_pribadi = $_GET['prib'];


$query = mysqli_query($conn,"DELETE FROM kepribadian WHERE id_pribadi='$id_pribadi'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'prib.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'prib.php'</script>";	
}
?>