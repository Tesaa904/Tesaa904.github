<?php
include('koneksi.php');

		$nis      = $_POST['nis'];
		$nama     = $_POST['nama'];
        $tmp_lahir= $_POST['tmp_lahir'];
        $tgl_lahir= $_POST['tgl_lahir'];
        $jenis_kl = $_POST['jenis_kl'];
        $agama    = $_POST['agama'];
        $alamat   = $_POST['alamat'];
        $thn_angkt= $_POST['thn_angkt'];
        $nama_ortu= $_POST['nama_ortu'];


$query = mysqli_query($conn,"UPDATE murid SET  nama='$nama', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jenis_kl='$jenis_kl', agama='$agama', alamat='$alamat', thn_angkt='$thn_angkt', nama_ortu='$nama_ortu'  WHERE nis='$nis'")or die(mysql_error());

if ($query)
{header('location:murid1.php');	
} else {
	echo "gagal";
    }

?>