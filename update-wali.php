<?php
include('koneksi.php');
$id_wali = $_POST['id_wali'];
	$nip = $_POST['nip'];
	$id_kls = $_POST['id_kls'];
	$id_thn = $_POST['id_thn'];

	$sql = ("UPDATE wali_kls SET nip = '$nip', id_kls = '$id_kls', 
		id_thn = '$id_thn' WHERE id_wali = '$id_wali'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='walikelas.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='walikelas.php';
			  </script>"; 
	}
	header("location:walikelas.php");
?>