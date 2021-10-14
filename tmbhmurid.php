<?php 
 session_start();
 if(!isset($_SESSION['username'])){
  header("location:login.php");
 }

 if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }else{
  
     include('koneksi.php'); 
   }
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
<?php
  include "layout/menu.php";    // tampilan menu
?>
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
                                    <label>NISN</label>
                                    <input name="nis" type="text" id="nis" class="form-control" placeholder="masukkan No induk siswa" required="required" class="help-block"/>
                                     <label>Nama</label>
                                    <input name="nama"  type="text" id="nama" class="form-control" placeholder="masukkan Nama Lengkap" required="required" />
                                    <label>Tempat Lahir</label>
                                    <input name="tmp_lahir"  type="text" id="tmp_lahir" class="form-control" placeholder="masukkan Tempat Lahir" required="required" />
                                     <label>Tanggal lahir</label>
                                    <input name="tgl_lahir" type="date"class="form-control"  id="tgl_lahir" placeholder="dd/mm/yyyy" required="required" />
                                    <div class="form-group">
                                    </div>
                                    <label>Jenis Kelamin</label>
                                  <select name="jenis_kl" id="jenis_kl"  class="form-control" required />
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>

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
