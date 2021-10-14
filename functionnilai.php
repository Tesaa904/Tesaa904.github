<?php
include "../conn.php";

if(isset($_POST['Simpan'])){    
$nis     		 = $_POST['nis'];
$id_kelas       = $_POST['id_kelas'];
$id_ta         = $_POST['id_ta'];
$id_mapel     = $_POST['id_mapel'];
$nip     = $_POST['nip'];
$nilai_harian   = $_POST['nilai_harian'];
$nilai_tugas   = $_POST['nilai_tugas'];
$UTS      = $_POST['UTS'];
$UAS      = $_POST['UAS'];
$keterangan     = $_POST['keterangan'];

 $cek = mysqli_query($conn,"SELECT * FROM tb_siswa WHERE nis='$nis' and nama_mapel='$nama_mapel'");

	if (mysqli_num_rows($cek) > 0){
		?>
		<script type="text/javascript">
			alert('Maaf , data sudah ada');
			window.location='nilai.php';
		</script>
		<?php

	}else {
		mysqli_query($conn,"INSERT INTO tb_nilai ( nis, id_kelas, id_ta, id_mapel,nip, nilai_harian, nilai_tugas, UTS, UAS, keterangan) VALUES 
                      ('$nis', '$id_kelas', '$id_ta', '$id_mapel', '$nip','$nilai_harian', '$nilai_tugas', '$UTS', '$UAS','$keterangan')");
		?>
		<script type="text/javascript">
			alert('Data berhasil di inputkan');
			window.location='nilai.php';
		</script>
		<?php
	}
}
?>