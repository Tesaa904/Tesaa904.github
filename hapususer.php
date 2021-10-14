<?php
include ('koneksi.php');
$nama_u = $_GET['nama_u'];

$query = mysqli_query($conn,"DELETE FROM user WHERE nama_u='$nama_u'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datauser.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datauser.php'</script>";	
}
?>