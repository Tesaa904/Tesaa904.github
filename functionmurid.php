<?php
include('koneksi.php'); 
if(isset($_POST['simpan'])){     
		$nis= $_POST['nis'];
		$nama= $_POST['nama'];
        $tmp_lahir= $_POST['tmp_lahir'];
        $tgl_lahir= $_POST['tgl_lahir'];
        $jenis_kl= $_POST['jenis_kl'];
        $agama= $_POST['agama'];
        $alamat= $_POST['alamat'];
        $thn_angkt= $_POST['thn_angkt'];
        $nama_ortu= $_POST['nama_ortu'];
       

         $input = mysqli_query($conn,"SELECT * FROM murid WHERE nis='$nis' and nama='$nama'" );

        if (mysqli_num_rows($input) > 0){
                ?>
                <script type="text/javascript">
                        alert('Maaf , data sudah ada');
                        window.location='murid1.php';
                </script>
                <?php

        }else {
                mysqli_query($conn,"INSERT INTO murid (nis,nama,tmp_lahir,tgl_lahir,jenis_kl,agama,alamat,thn_angkt,nama_ortu) VALUES ('$nis','$nama','tmp_lahir','$tgl_lahir','$jenis_kl','$agama','$alamat','$thn_angkt','$nama_ortu')");
                        
                ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='murid1.php';
                </script>
                <?php
        }
}


?>