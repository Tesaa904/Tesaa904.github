 <?php
include ('koneksi.php');
$id_nilai_sos_sp = $_GET['nil'];


$query = mysqli_query($conn,"DELETE FROM nilai_sos_sp WHERE id_nilai_sos_sp='$id_nilai_sos_sp'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'nilai_sos_spirit.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'nilai_sos_spirit.php'</script>";	
}
?>