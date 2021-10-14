<?php
include "koneksi.php";

  if (isset($_POST['simpan'])){
      $post_thn = $_POST['id_thn'];
      $post_kel = $_POST['id_kel'];
      $post_sem = $_POST['id_sem'];
      $post_jml = $_POST['jml'];
      for($i=0;$i<=($post_jml-1);$i++){
        $rr = "insert into perkem (nis,id_kls,id_smstr,id_thn,id_ektra,prestasi,ket,lihat,gigi,dengar,tinggi,berat)
                                VALUE('".$_POST['nis'][$i]."','$post_kel','$post_sem','$post_thn','".$_POST['eksktra'][$i]."','".$_POST['prestasi'][$i]."',
                                '".$_POST['ket'][$i]."','".$_POST['lihat'][$i]."','".$_POST['gigi'][$i]."','".$_POST['dengar'][$i]."','".$_POST['tinggi'][$i]."',
                                '".$_POST['berat'][$i]."')";
        //echo $rr."<br>";
        $sql_save = mysqli_query($conn,$rr);
      }
      if ($sql_save){
        header("location:kembang.php?alert=1");
      }
  } 
?>

