<?php
include('koneksi.php'); 
if(isset($_POST['simpan'])){ 
        $id_ektra= $_POST['id_ektra'];    
		$nm_ektra= $_POST['nm_ektra'];
       

         $input = mysqli_query($conn,"SELECT * FROM eksktra WHERE nm_ektra='$nm_ektra'" );

        if (mysqli_num_rows($input) > 0){
                ?>
                <script type="text/javascript">
                        alert('Maaf , data sudah ada');
                        window.location='ekskul.php';
                </script>
                <?php

        }else {
                mysqli_query($conn,"INSERT INTO eksktra (id_ektra, nm_ektra) VALUES ('$id_ektra', '$nm_ektra')");
                        
                ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='ekskul.php';
                </script>
                <?php
        }
}


?>