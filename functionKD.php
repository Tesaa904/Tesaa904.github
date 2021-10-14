<?php
include('koneksi.php');
if(isset($_POST['simpan'])){ 
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

 $cek = mysqli_query($conn,"SELECT * FROM aturan WHERE id_aturan='$id_aturan'");

	if (mysqli_num_rows($cek) > 0){
		?>
		<script type="text/javascript">
			alert('Maaf , data sudah ada');
			window.location='KD.php';
		</script>
		<?php

	}else {
		mysqli_query($conn,"INSERT INTO aturan (id_aturan, id_mapel, id_smstr, id_thn, kd1, kd2, kd3, kd4, ki1, ki2, ki3, ki4) VALUES 
                      ('$id_aturan', '$id_mapel', '$id_smstr', '$id_thn', '$kd1', '$kd2', '$kd3', '$kd4', '$ki1', '$ki2', '$ki3', '$ki4')");
		?>
		<script type="text/javascript">
			alert('Data berhasil di inputkan');
			window.location='KD.php';
		</script>
		<?php
	}
}
?> 