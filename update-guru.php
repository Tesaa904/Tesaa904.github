<?php
include('koneksi.php');
$nip 	 = $_POST['nip'];
$nama_gr = $_POST['nama_gr'];
$tgl_lahir  = $_POST['tgl_lahir'];
$alamat  = $_POST['alamat'];

$query = mysqli_query($conn,"UPDATE guru SET  nama_gr='$nama_gr', tgl_lahir='$tgl_lahir', alamat='$alamat' WHERE nip='$nip'")or die(mysql_error());
if ($query){
header('location:guru.php');   
} else {
    echo "gagal";
    }
?>