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
<?php
  include "layout/header.php"; //tampilan layout
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
         <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
               <a class="navbar-brand" href="index.php">kanismur</a> 
            </div>
  <div style="color: blue;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; 
        </nav>   
           <!-- /. NAV TOP  -->
<?php
  
  include "layout/menu.php";    // tampilan menu
?>
            
        </nav>  
    <!-- row -->
    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ubah Data Mata Pelajaran </h2> 
                    </div>
              </div>
               <?php
            $query = mysqli_query($conn,"SELECT * FROM mapelj WHERE id_mapel='$_GET[kd]'");
            $row1 = mysqli_fetch_array($query);
            ?>
                   <form class="" action="update-mapel.php" method="post" name="form1" id="form1">
                <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                             <form role="form">
                         <div class="form-group">
                              <label class="col-sm-2 control-label">ID Mapel</label>
                                  <input name="id_mapel" type="text" id="id_mapel" class="form-control" value=" <?php echo $row1['id_mapel'];?>" readonly  /> 
                                  </div>

                                 <div class="form-group">
                              <label class="col-sm-2  control-label">Mata Pelajaran</label>
                                  <select name="nm_mapel" id="nm_mapel"  class="form-control" required autofocus="on" />
                                    <option><?php echo $row1['nm_mapel'];?> </option>
                                   <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                    <option value="PPKN">PPKN</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="IPA">Ilmu Pengetahuan Alam</option>
                                    <option value="IPS">Ilmu Pengetahuan Sosial</option>
                                     <option value="Agama">Agama</option>
                                     <option value="Seni Budaya+Prakarya">Senibudaya dan Pra karya</option>
                                    <option value="PJOK"> PJOK</option>
                                    <option value="Bahasa jawa">Bahasa Jawa</option>
                                    <option value="Bahasa Indonesia">Bahasa Inggris</option>
                                     <option value="komputer">Komputer</option>
                                  </select>
                                  </div>
                                    <input type="submit" value="Ubah" class="btn btn-sm btn-primary" name="submit" />
                                    <a href="mapel.php" class="btn btn-sm btn-danger">Batal </a>
                                    </form>
                                </div>
                              </div>  
                            </div>
                          </form>
                        </div>
                    
                    <?php
                  }
                  ?>
 <?php
    include "layout/footer.php";
  ?>    
  
</body>
</html>