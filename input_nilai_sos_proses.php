<?php
	include "koneksi.php"; 
	
	if (isset($_POST['simpan'])){
		$post_tahun = $_POST['id_thn'];
		$post_sem = $_POST['id_sem'];
		$post_kelas = $_POST['id_kel'];
		$post_jml = $_POST['jml'];
		
		for ($i=0;$i<=($post_jml-1);$i++){			
			//simpan ke DB
			$sql_save = mysqli_query($conn,"insert into nilai_sos_sp (nis,id_thn,id_smstr,id_kls,nil_sossb,nil_sospb,nil_sprtsb,nil_sprtpb)
						values('".$_POST['nis'][$i]."','$post_tahun','$post_sem','$post_kelas','".$_POST['nil_sossb'][$i]."','".$_POST['nil_sospb'][$i].
						"','".$_POST['nil_sprtsb'][$i]."','".$_POST['nil_sprtpb'][$i]."')");		
		}
		if ($sql_save){
			header("location:nilai_sos_spirit.php?alert=1");
		}
	}
?>