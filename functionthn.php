<?php
include('koneksi.php'); 
if(isset($_POST['simpan'])){    
		$thn= $_POST['thn'];

         $input = mysqli_query($conn,"SELECT * FROM thnajar WHERE thn='$thn'" );

        if (mysqli_num_rows($input) > 0){
                ?>
                <script type="text/javascript">
                        alert('Maaf , data sudah ada'); 
                        window.location='thn.php';
                </script>
                <?php

        }else {
                mysqli_query($conn,"INSERT INTO thnajar (thn) VALUES ('$thn')");
                        
                ?>
                <script type="text/javascript">
                        alert('Data berhasil di inputkan');
                        window.location='thn.php';
                </script>
                <?php
        }
}
 

?>