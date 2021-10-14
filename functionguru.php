<?php
include('koneksi.php'); 
if(isset($_POST['simpan'])){  
	$nip       =$_POST['nip'];
	$nama_gr   =$_POST['nama_gr'];
    $tgl_lahir =$_POST['tgl_lahir'];
    $alamat    =$_POST['alamat'];
    
         $input = mysqli_query($conn,"SELECT * FROM guru WHERE nip='$nip'and nama_gr='$nama_gr'");

        if (mysqli_num_rows($input) > 0){
                ?>
                <script type="text/javascript">
                        alert('Maaf , data sudah ada');
                       window.location='guru.php';
                </script>
                <?php

        }else {
                mysqli_query($conn,"INSERT INTO guru (nip,nama_gr,tgl_lahir,alamat) VALUES ('$nip','$nama_gr','$tgl_lahir','$alamat')");
                        
                ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='guru.php';
                </script>
                <?php
        }
    }

?>
