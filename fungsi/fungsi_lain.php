<?php	
	
	function nama_tahun($tahun){
		include "koneksi.php";
		$sql_tahun = mysqli_query($conn,"select thn from thnajar where id_thn='$tahun'");
		$nama_tahun= mysqli_fetch_array($sql_tahun);
		return $nama_tahun['thn'];
	}
	function nama_kelas($kelas){
		include "koneksi.php";
		$sql_kelas = mysqli_query($conn,"select kls from kelas where id_kls='$kelas'");
		$nama_kelas= mysqli_fetch_array($sql_kelas);
		return $nama_kelas['kls'];
	}
	function nama_sem($sem){
		include "koneksi.php";
		$sql_sem = mysqli_query($conn,"select smstr from smstr where id_smstr='$sem'");
		$nama_sem= mysqli_fetch_array($sql_sem);
		return $nama_sem['smstr'];
	}
	function nama_ekskul($ekskul){
		include "koneksi.php";
		$sql_eks = mysqli_query($conn,"select nm_ektra from eksktra where id_ektra='$ekskul'");
		$nama_eks= mysqli_fetch_array($sql_eks);
		return $nama_eks['nm_ektra'];
		}
	function nama_siswa($nis){
		include "koneksi.php";
		$sql_siswa = mysqli_query($conn,"select nama from murid where nis='$nis'");
		$nama_siswa= mysqli_fetch_array($sql_siswa);
		return $nama_siswa['nama'];
	}

	function nama_mapel($mapel){
		include "koneksi.php";
		$sql_mapel = mysqli_query($conn,"select nm_mapel from mapelj where id_mapel='$mapel'");
		$nama_mapel= mysqli_fetch_array($sql_mapel);
		return $nama_mapel['nm_mapel'];
	}
	function pembulatan($duit)
	{
	 $ratusan 	= substr($duit,-3);
	 $pokok		= $duit-$ratusan;
	 if($ratusan<500 and $ratusan!=0)
	 $hasil = $pokok + 500;
	 else if ($ratusan==500)
	 $hasil = $duit;
	 else if (($ratusan-0)==0)
	 $hasil = $duit;
	 else
	 $hasil = $pokok + 1000;
	 return $hasil;
	}
?>
