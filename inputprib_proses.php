<?php
	include "koneksi.php";
	
	if (isset($_POST['simpan'])){
		$post_thn = $_POST['id_thn'];
		$post_kel = $_POST['id_kel'];
		$post_sem = $_POST['id_sem'];
		$post_jml = $_POST['jml'];
		for($i=0;$i<=($post_jml-1);$i++){
        $rr = "insert into kepribadian (nis,id_kls,id_smstr,id_thn,sakit,ijin,alpha)
                                VALUE('".$_POST['nis'][$i]."','$post_kel','$post_sem','$post_thn','".$_POST['sakit'][$i]."','".$_POST['ijin'][$i]."',
                                '".$_POST['alpha'][$i]."')";
        //echo $rr."<br>";
        $sql_save = mysqli_query($conn,$rr);
	}
	if ($sql_save){
        header("location:prib.php?alert=1");
    }
  } 
?>