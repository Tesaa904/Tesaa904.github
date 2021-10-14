 <?php
include ('koneksi.php');
$id_nilai = $_GET['nil'];


$query = mysqli_query($conn,"DELETE FROM nilai WHERE id_nilai='$id_nilai'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'nilai.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'nilai.php'</script>";	
}
?>