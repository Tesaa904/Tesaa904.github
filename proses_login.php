 <?php 

$error='';
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
	include('koneksi.php');

// menangkap data yang dikirim dari form login
 if(isset($_POST['login'])){
 	$username = $_POST['username'];
	$pass = (md5($_POST['pass'])); 
 
 	$login = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username' AND pass= '$pass'")or die(mysql_error());
 	$count=mysqli_num_rows($login);
 	if ($count==0){
 			echo "<script>alert('User Gagal Masuk!'); window.location = 'login.php'</script>";
		} else {
               
    // }else
// cek apakah username dan password di temukan pada database
  	//{
	$data = mysqli_fetch_assoc($login);
		// buat session login dan username
		$_SESSION['username'] = $data['username'];
		$_SESSION['level'] = $data['level'];
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
		
		// alihkan ke halaman dashboard admin
		header("location:index.php");
	}

	// cek jika user login sebagai walikelas
	else if($data['level']=="walikelas"){
		
		// alihkan ke halaman dashboard walikelas
		header("location:index.php");

 	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
}
 	
  }
}
?>