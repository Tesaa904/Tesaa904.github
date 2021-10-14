 <?php
//panggil koneksi - phpdanmysql.com
 include('koneksi.php'); 
//function registrasi($row1){
 if(isset($_POST['register'])){

    $nama_u = ($_POST['nama_u']);
   $username = ($_POST['username']);
    $pass2 = ($_POST['pass']);
    $pass = md5($pass2);
   $level = ($_POST['level']);
//cek username
  $result=  mysqli_query($conn,"SELECT * FROM user WHERE nama_u='$nama_u' and username='$username'");
      if (mysqli_num_rows($result) > 0){
                ?>
                <script type="text/javascript">
                        alert('Maaf , data sudah ada');
                        window.location='datauser.php';
                </script>
                <?php

        }else {
                mysqli_query($conn,"INSERT INTO user (nama_u,username,pass,level) VALUES ('$nama_u','$username','$pass','$level')");
             ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='datauser.php';
                </script>
                <?php
            }    
}

?>