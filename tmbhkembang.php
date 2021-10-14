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
                     <h2>Tambah Data Siswa</h2> 
                       
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
                             <form class="" action="functionmurid.php"  method="post">
                                 <div class="form-group">
                                    <label>Nis</label>
                                    <input name="nis" type="text" id="nis" class="form-control" placeholder="masukkan No induk siswa" required="required" />
                                     <label>Nama</label>
                                    <input name="nama"  type="text" id="nama" class="form-control" placeholder="masukkan Nama Lengkap" required="required" />
                                     <label>Tanggal lahir</label>
                                    <input name="tgl_lahir" type="date"class="form-control"  id="tgl_lahir" placeholder="dd/mm/yyyy" required="required" />
                                    <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                  <select name="jenis_kl" id="jenis_kl"  class="form-control" required />
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                                     </div>

                                    <div class="form-group">
                                    <label>Agama</label>
                                    <select id="agama" name="agama" class="form-control">
                                      <option value="Katolik">Katolik</option>
                                      <option value="Kristen">Kristen</option>
                                      <option value="Islam">Islam</option>
                                      <option value="Hindu">Hindu</option>
                                      <option value="Budha">Budha</option>
                                    </select>
                                    </div>
                                    
                                     <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3" required="required"></textarea>
                                    <label>Tahun Angkat</label>
                                    <input name="thn_angkt" id="thn_angkt" class="form-control" placeholder="yyyy" required="required" />
                                    <label>Orang Tua</label>
                                    <input name="nama_ortu" id="nama_ortu" class="form-control" placeholder="masukkan nama orangtua murid" required="required" />
                                        </div>
                                           <input type="submit" value="simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                           <a href="murid1.php" class="btn btn-sm btn-danger">Batal </a>
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
