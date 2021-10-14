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
<?
$carikode = mysqli_query($conn, "SELECT id_ektra from eksktra") or die (mysqli_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomatis = "EK".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "EK001";
  }
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
                             <form class="" action="functionekskul.php"  method="post">
                                 <div class="form-group">
                                   <label>ID Eksktakulikuler</label>
                                    <input name="id_ektra" type="text" id="id_ektra" class="form-control"  value="<?php echo $kode_otomatis;?>" readonly="readonly" required="required" />

                                     <label>Ekstakulikuler</label>
                                    <input name="nm_ektra"  type="text" id="nm_ektra" class="form-control" placeholder="masukkan Nama Ekstrakulikuler" required="required" autofocus="on" />
                                    <br/>
                                           <input type="submit" value="simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                           <a href="ekskul.php" class="btn btn-sm btn-danger">Batal </a>
                                         </form>
                                </div>
                            </div>
                            <?
                          }
                          ?>
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
    <?php
    include "layout/footer.php";
  ?>
</body>
</html>
