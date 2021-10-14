<?php
include('koneksi.php'); 
if(isset($_POST['simpan'])){    
        $id_mapel= $_POST['id_mapel']; 
		$nm_mapel= $_POST['nm_mapel'];
       

     $cek = mysqli_query($conn,"SELECT * FROM mapelj WHERE nm_mapel='$nm_mapel'");
    if (mysqli_num_rows($cek) > 0){
        ?>
        <script type="text/javascript">
            alert('Maaf , data sudah ada');
            window.location='mapel.php';
        </script>
        <?php

        }else {
                mysqli_query($conn,"INSERT INTO mapelj (id_mapel ,nm_mapel) VALUES ('$id_mapel', '$nm_mapel')");
                        
                ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='mapel.php';
                </script>
                <?php
        }
}


?>