<?php
require_once('koneksi.php');
if(isset($_POST['submit'])){ 
$id_det_kls		= $_POST['id_det_kls'];    
$id_kls     	= $_POST['id_kls'];
$nis       		= $_POST['nis'];
$id_thn         = $_POST['id_thn'];

 $cek = mysqli_query($conn,"SELECT * FROM det_kls WHERE nis='$nis'");

	if (mysqli_num_rows($cek) > 0){
		?>
		<script type="text/javascript">
			alert('Maaf , data sudah ada');
			window.location='kelas.php';
		</script>
		<?php

	}else {
	mysqli_query($conn,"INSERT INTO det_kls (id_det_kls, id_kls, nis, id_thn)VALUES ('$id_det_kls', '$id_kls', '$nis', '$id_thn')") or die(mysql_error());
		?>
		<script type="text/javascript">
			alert('Data berhasil di inputkan');
			window.location='kelas.php';
		</script>
		<?php
	}
}
?> 