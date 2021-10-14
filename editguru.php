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
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ubah Data Guru</h2> 
                    </div>
                       
                <?php 
                $nip   = $_GET['nip'];          
                 $query = mysqli_query($conn,"SELECT * FROM guru WHERE nip='$nip'");
                while($row1 = mysqli_fetch_array($query)){
                  ?>
                  <form class="" action="update-guru.php" method="post" name="form1" id="form1">
               <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                             <form role="form">
                          <div class="form-group">
                          <label class="col-sm-2 control-label">Nip</label>
                                  <input name="nip" class="form-control" id="nip" type="text" value="<?php echo $row1['nip'];?>" readonly required />
                                  </div>
                                 <div class="form-group">
                              <label class="col-sm-2 control-label">Nama Guru</label>
                                  <input name="nama_gr" class="form-control" id="nama_gr" type="text" value="<?php echo $row1['nama_gr'];?>" required autofocus="on"/>
                                  </div>

                                 <div class="form-group">
                              <label class="col-sm-2 control-label">Tanggal Lahir</label>     
                              <input name="tgl_lahir" class="form-control" id="tgl_lahir" type="date" value="<?php echo $row1['tgl_lahir'];?>" required />
                                  </div>
                                  
                                    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                  <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $row1['alamat'];?>" required />
                              </div>
                              <div class="form-group">
                               <label class="col-sm-2 control-label"></label>
                                  <input type="submit" value="Ubah"class="btn btn-sm btn btn-primary" />&nbsp;
                                    <a href="guru.php" class="btn btn-sm btn-danger">Batal </a>
                                    </div>
                                    </form>
                                    <?php
                                  }
                                  ?>

                                </div>
                              </form>
                            </div>
                          </div>
        </div>
        </div>
        <?
      }
      ?>
         <! --/wrapper -->
     <!-- /MAIN CONTENT -->
        <footer class="site-footer">
            <div class="copy text-center">
            &copy; copyright 2018 | by SDkanisius1murukan</a>
              </div>
          </div>
      </footer>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
      <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/sweetalert.min.js"></script> <!-- lib js untuk sweet alert -->
 <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

</body>
</html>
