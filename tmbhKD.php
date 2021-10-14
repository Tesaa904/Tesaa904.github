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
$carikode = mysqli_query($conn, "SELECT id_aturan from aturan") or die (mysqli_error());
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
   $kode_otomatis = "kd".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "kd001";
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
                     <h2>Tambah Data Diskripsi KD</h2> 
                       
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
                             <form class="" action="functionKD.php"  method="post"  enctype="multipart/form-data" name="form1" id="form1">
                                 <div class="form-group">
                                    <label>ID Kopetensi Dasar</label>
                                     <input name="id_aturan" type="text" id="id_aturan" class="form-control"value="<?php echo $kode_otomatis;?>" readonly />
                                    <label>Mata Pelajaran</label>
                                    <select name="id_mapel" type="text" id="id_mapel" class="form-control" required="required" />
                                     <option value="" selected="selected" autofocus="on">pilih matapelajaran</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM mapelj ORDER BY id_mapel ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_mapel'].'>'.$row1['nm_mapel'].'</option>'; }
                                    //}
                                    ?>
                                      </select>
                                    <label>Semester</label>
                                   <select name="id_smstr" type="text" id="id_smstr" class="form-control" />
                                     <option value="" selected="selected" autofocus="on">pilih Semester</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM smstr ORDER BY id_smstr ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_smstr'].'>'.$row1['smstr'].'</option>'; }
                                    //}
                                    ?>
                                      </select>
                                    <label>Tahun</label>
                                    <select name="id_thn" type="text" id="id_thn" class="form-control" />
                                     <option value="" selected="selected" autofocus="on">pilih Tahun Ajaran</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM thnajar ORDER BY id_thn ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_thn'].'>'.$row1['thn'].'</option>'; }
                                    //}
                                    ?>
                                    </select>
                                     <label>Diskripsi KD1</label>
                                    <input name="kd1"  type="text" id="kd1 " class="form-control" placeholder="masukkan Diskripsi KD" required="required" />
                                    <label>Diskripsi KD2</label>
                                    <input name="kd2"  type="text" id="kd2" class="form-control" placeholder="masukkan Diskripsi KD" required="required" />
                                    <label>Diskripsi KD3</label>
                                    <input name="kd3"  type="text" id="kd3" class="form-control" placeholder="rmasukkan Diskripsi KD" required="required" />
                                    <label>Diskripsi KD4</label>
                                    <input name="kd4"  type="text" id="kd4" class="form-control" placeholder="masukkan Diskripsi KD" required="required" />
                                    <label>Diskripsi KI1</label>
                                    <input name="ki1"  type="text" id="ki1" class="form-control" placeholder="masukkan Diskripsi Ki" required="required" />
                                    <label>Diskripsi KI2</label>
                                    <input name="ki2"  type="text" id="ki2" class="form-control" placeholder="masukkan Diskripsi Ki" required="required" />
                                    <label>Diskripsi KI3</label>
                                    <input name="ki3"  type="text" id="ki3" class="form-control" placeholder="masukkan Diskripsi Ki" required="required" />
                                    <label>Diskripsi KI4</label>
                                    <input name="ki4"  type="text" id="ki4" class="form-control" placeholder="masukkan Diskripsi Ki" required="required" />
                                    <br/>
                                           <input type="submit" value="simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                           <a href="KD.php" class="btn btn-sm btn-danger">Batal </a>
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
