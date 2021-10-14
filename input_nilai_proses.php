<?php
	include "koneksi.php"; 
	
	if (isset($_POST['simpan'])){
		$post_mapel = $_POST['id_mapel'];
		$post_tahun = $_POST['id_thn'];
		$post_sem = $_POST['id_sem'];
		$post_kelas = $_POST['id_kel'];
		$post_jml = $_POST['jml'];
		
		for ($i=0;$i<=($post_jml-1);$i++){
			//cari predikat KD
			if (($_POST['nilkd'][$i]>=88.34) and ($_POST['nilkd'][$i]<=100)){
				$ind_kd = "A";
			} else if (($_POST['nilkd'][$i]>=76.68) and ($_POST['nilkd'][$i]<=88.33)){
				$ind_kd = "B";
			} else if (($_POST['nilkd'][$i]>=65) and ($_POST['nilkd'][$i]<=76.67)){
				$ind_kd = "C";
			} else if (($_POST['nilkd'][$i]>=0) and ($_POST['nilkd'][$i]<=64.99)){
				$ind_kd = "D";
			}
			
			//cari predikat KI
			if (($_POST['nilki'][$i]>=88.34) and ($_POST['nilki'][$i]<=100)){
				$ind_ki = "A";
			} else if (($_POST['nilki'][$i]>=76.68) and ($_POST['nilki'][$i]<=88.33)){
				$ind_ki = "B";
			} else if (($_POST['nilki'][$i]>=65) and ($_POST['nilki'][$i]<=76.67)){
				$ind_ki = "C";
			} else if (($_POST['nilki'][$i]>=0) and ($_POST['nilki'][$i]<=64.99)){
				$ind_ki = "D";
			}
			
			//simpan ke DB
			$sql_save = mysqli_query($conn,"insert into nilai (nis,id_mapel,id_thn,id_smstr,id_kls,nilkd,nilki,indikator_kd,indikator_ki,id_aturan)
						values('".$_POST['nis'][$i]."','$post_mapel','$post_tahun','$post_sem','$post_kelas','".$_POST['nilkd'][$i]."','".$_POST['nilki'][$i].
						"','$ind_kd','$ind_ki','".$_POST['id_aturan'][$i]."')");		
		}
		if ($sql_save){
			header("location:nilai.php?alert=1");
		}
	}
?>