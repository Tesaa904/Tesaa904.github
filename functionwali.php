<?php
require_once('koneksi.php');
if(isset($_POST['submit'])){
		$id_wali= $_POST['id_wali'];   
        $nip 	= $_POST['nip'];
        $id_kls = $_POST['id_kls'];
        $id_thn = $_POST['id_thn'];
      
 $cek = mysqli_query($conn,"SELECT * FROM wali_kls WHERE nip='$nip'");

	if (mysqli_num_rows($cek) > 0){
		?>
		<script type="text/javascript">
			alert('Maaf , data sudah ada');
			window.location='walikelas.php';
		</script>
		<?php

	}else {
        mysqli_query($conn,"INSERT INTO wali_kls (id_wali, nip, id_kls, id_thn)VALUES ('$id_wali', '$nip', '$id_kls', '$id_thn')") or die(mysql_error());
    ?>
		<script type="text/javascript">
			alert('Data berhasil di inputkan');
			window.location='walikelas.php';
		</script>
		<?php
	}
}
           
?>


