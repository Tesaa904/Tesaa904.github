 <?php 
 session_start();
 if(!isset($_SESSION['username'])){
  header("location:login.php");
 }

 if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }else{
  
     include('koneksi.php'); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php
  include "layout/header.php"; //tampilan layout
?>
</head>
<body>
    <div id="wrapper">
                <?php
  include "layout/navbar.php"; 
  include "layout/menu.php";    // tampilan menu
?>
            
        </nav>  
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tambah Data User</h2> 
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                    <form class="" action="functionuser.php"  method="post">
                                 <div class="form-group">
                                    <!--<label>ID</label>
                                    <input name="id_user" type="text" id="id_user" class="form-control" />-->
                                    <label>NAMA</label>
                                    <input name="nama_u" type="text" id="nama_u" class="form-control" placeholder="masukkan Nama Panjang" required="required" autofocus="" />
                                     <label>USER</label>
                                    <input name="username" type="text" id="username" class="form-control" placeholder="masukkan Username" required="required" />
                                     <label>PASSWORD</label>
                                    <input name="pass" type="password" id="pass" class="form-control"placeholder="masukkan password" required="required" /> 
                                   <div class="form-group">
                                    <label>Level</label>
                                    <select id="level" name="level" class="form-control">
                                    <option value="admin">admin</option>
                                    <option value="walikelas">walikelas</option>
                                    
                                    </select>
                                    </div>
            <div class="form-group">
                
                <button type="submit" name="register" class="btn btn-sm btn-primary"> &nbsp;</i> Daftar</button>
                 <a href="datauser.php" class="btn btn-sm btn-danger">Batal </a>
                                         
            </div>
        </form>
    </div>  
</div>    
 </div>
         <!-- /. PAGE WRAPPER  -->
</div>
</div>
             <!-- /. PAGE INNER  -->
                       </div>
                   </div>
          </div>
        <?
      }
      ?>

    <! --/wrapper -->
     <!-- /MAIN CONTENT -->
       <?php
    include "layout/footer.php";
  ?>
</body>
</html>