<?php
include('koneksi.php');
$id_aturan		= $_POST['id_aturan'];    
$id_mapel     	= $_POST['id_mapel'];
$id_smstr       = $_POST['id_smstr'];
$id_thn         = $_POST['id_thn'];
$kd1			=$_POST['kd1'];
$kd2			=$_POST['kd2'];
$kd3			=$_POST['kd3'];
$kd4			=$_POST['kd4'];
$ki1			=$_POST['ki1'];
$ki2			=$_POST['ki2'];
$ki3			=$_POST['ki3'];
$ki4			=$_POST['ki4'];

	$sql = ("UPDATE aturan SET id_mapel = '$id_mapel', id_smstr = '$id_smstr', 
		id_thn = '$id_thn',kd1 = '$kd1',kd2 = '$kd2',kd3 = '$kd3',kd4 = '$kd4',ki1 = '$ki1',ki2 = '$ki2',ki3 = '$ki3',ki4 = '$ki4' WHERE id_aturan = '$id_aturan'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='KD.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='KD.php';
			  </script>"; 
	}
	header("location:KD.php");
?>