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
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
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
                                <a href="ekskul.php">ekstrakulikuler</a>
                            </li>
                             <li>
                                <a href="thn.html">Tahun Ajaran</a>
                            </li>
                            <li>
                                <a href="smstr.html">Semester</a>
                            </li>
                          </ul>
                      <li>
                        <a href="#"><i class="fa fa-edit fa-3x"></i> Data Penilaian <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="prib.html">Kepribadian</a>
                            </li>
                            <li>
                                <a href="kembang.html">Perkembangan</a>
                            </li>
                            <li>
                                <a href="nilai">Nilai siswa</a>
                            </li>
                            
                        </ul>
                    </li>                
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tambah Data Ekstrakulikuler</h2> 
                       
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
                             <form class="" action="functionsmstr.php"  method="post">
                                 <div class="form-group">
                                    <label>ID</label>
                                    <input name="id_smstr" type="text" id="id_smstr" class="form-control" required="required" />
                                    <label>Semester</label>
                                    <input name="smstr" type="text" id="smstr" class="form-control" required="required" />
                                    <label>Tahun</label>
                                    <input name="id_thn" type="text" id="id_thn" class="form-control" required="required" />
                                     <label>Diskripsi KD1</label>
                                    <input name="diskpkd1"  type="text" id="diskipkd2 " class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KD2</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KD3</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KD4</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KI1</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KI2</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KI3</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KI4</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi sosial</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi priritual</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                    <label>Diskripsi KD1</label>
                                    <input name="nm_ekskul"  type="text" id="nm_ekskul" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" />
                                           <input type="submit" value="simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                           <a href="ekskul.php" class="btn btn-sm btn-danger">Batal </a>
                                         </form>
                                </div>
                            </div>
                        </div>
                        <?
                    }
                    ?>
                    <!-- End Form Elements -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
