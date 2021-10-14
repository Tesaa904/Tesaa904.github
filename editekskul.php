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
<?php
 //tampilan navbar
  include "layout/menu.php";    // tampilan menu
?>
    </nav>  
       <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
          <?php
            include "alert.php";
           ?>
            <div id="page-inner">
                <div class="row">
                  <div class="col-md-12">
                     <h2>Ubah Data Ekstrakulikuler </h2> 
                    </div>
                   </div>
                <?php 
                $nm_ektra = $_GET['nm_ektra'];          
                 $query = mysqli_query($conn,"SELECT * FROM eksktra WHERE nm_ektra='$nm_ektra'");
                while($row1 = mysqli_fetch_array($query)){
                  ?>
                   <form class="" action="update-ekskul.php" method="post" name="form1" id="form1">
                <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">ID Ekstrakulikuler</label>
                                  <input name="id_ektra" type="text" id="id_ektra" class="form-control" value="<?php echo $row1['id_ektra'];?>" readonly  /> 
                                  </div>

                                  <form role="form">
                                 <div class="form-group">
                              <label class="col-sm-2 control-label">Ekstrakulikuler</label>                     
                              <input name="nm_ektra" type="text" id="nm_ektra" class="form-control" value="<?php echo $row1['nm_ektra'];?>"autofocus="on" />
                                    </div>
                                    <input type="submit" value="Ubah" class="btn btn-primary" />&nbsp;
                                    <a href="ekskul.php" class="btn btn-sm btn-danger">Batal </a>
                                    </form>
                                   </div>
                                    <?php
                                  }
                                  ?>
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
