<?php
include('koneksi.php');

		$nama_u     = $_POST['nama_u'];
        $username= $_POST['username'];
         $pass2 = ($_POST['pass']);
        $pass = md5($pass2);
        $level    = $_POST['level'];


$query = mysqli_query($conn,"UPDATE user SET  username='$username', pass='$pass', level='$level' WHERE nama_u='$nama_u'")or die(mysql_error());

if ($query)
{header('location:datauser.php');	
} else {
	echo "gagal";
    }

?>