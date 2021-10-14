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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SD kanisius 1 Murukan</title>
     <script src="assets/js/jQuery-2.1.4.min.js"></script> <!-- lib js untuk ajax -->
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/adminLTE.min.css">
  
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
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
                    <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="assets/img/logo.png" class="user-image img-circle"/>
          </li>
        
          
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-3x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="guru.php">Guru</a>
                            </li>
                            <li>
                                <a href="murid1.php">Siswa</a>
                            </li>
                            <li>
                                <a href="walikelas.php">Walikelas</a>
                            </li>
                            <li>
                                <a href="kelas.php">Kelas</a>
                            </li>
                            <li>
                                <a href="mapel.php">Mata Pelajaran</a>
                            </li>
                             <li>
                                <a href="ekskul.php">ekstrakulikuler</a>
                            </li>
                             <li>
                                <a href="thn.php">Tahun Ajaran</a>
                            </li>
                            <li>
                                <a href="smstr.php">Semester</a>
                            </li>
                             <li>
                                <a href="datauser.php">Buat User</a>
                            </li>
                          </ul>
                      <li>
                        <a href="#"><i class="fa fa-edit fa-3x"></i> Data Penilaian <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                                <a href="prib.php">Kepribadian</a>
                            </li>
                            <li>
                                <a href="kembang.php">Perkembangan</a>
                            </li>
                            <li>
                                <a href="nilai.php">Nilai siswa</a>
                            </li>
                            
                        </ul>  
                  <li  >
                        <a  href="laporan.php"><i class="fa fa-square-o fa-3x"></i>laporan <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           <li>
                                <a href="l_data_cls.php">Laporan Data Kelas</a>
                            </li>
                    </li> 
                </ul>
               
            </div> 
            
        </nav>
        <!-- /. NAV SIDE  -->
        
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-12">
                    <h2>Daftar Data smster</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='mapel.php' method="POST">
                     <a href="tmbhmapel.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan nama mapel' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='mapel.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </div>
                    </div>
                <br />
                   <!-- </div>-->
                    <!--</div>-->
                    <!-- Advanced Tables -->
                    <div class="row mt">
                     <div class="col-lg-12">
                      <!--  <div class="content-box-large"> -->
                        <div class="panel panel-success">
                         <div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                         <tbody>
                           <?php
                            $sql="select * from smstr";

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $sql="SELECT * FROM  smstr 
                                   where id_smstr like '%$qcari%'
                                   or nm_smstr like '%$qcari%'";
                                    }
                                    $result=mysqli_query($conn,$sql) or die(mysql_error());
                                    ?>
                                    
                                     <table class="table table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                                            <th>No.<i class="fa fa-sort"></i></th>
                                            <th>smstr<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                
                                            <?php
                                      //include('koneksi.php');
                                          $No = 0;
                                        while ($row1 = mysqli_fetch_array($result)) {
                                          $No++;
                                  ?>
              
                                                <tr>
                                                    <td><?php echo $No;?></td>
                                                    <td><?php echo $row1['smstr'];?></td>
                                                    
                                                    <td><center><a  href="editsmstr.php?kb=<?php echo $row1['id_smstr'];?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapusmapel.php?kb=<?php echo $row1['id_smstr'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></center></td></tr>
                                               
                                             <?php
                                              }
                                            }
                                               ?>
                                            </tbody>
                                             </table>
                        </div>
                        </div>
                        </div>
                      </div>
          </div>

    <! --/wrapper -->
     <!-- /MAIN CONTENT -->
        <footer class="site-footer">
            <div class="copy text-center">
            &copy; copyright 2018 | by SDkanisius1murukan</a>
              </div>
          </div>
      </footer>
             <!-- /. PAGE INNER  -->
          <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
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
  <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>