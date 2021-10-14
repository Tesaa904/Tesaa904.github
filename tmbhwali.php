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
$carikode = mysqli_query($conn, "SELECT id_wali from wali_kls") or die (mysqli_error());
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
   $kode_otomatis = "Wl".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "Wl001";
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
                     <h2>Tambah Data Wali kelas</h2> 
                       
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
                             <form class="" action="functionwali.php"  method="POST" enctype="multipart/form-data" name="form1" id="form1">
                                 <div class="form-group">
                                    <label>ID wali</label>
                                    <input name="id_wali" type="text" id="kode_otomatis" value="<?php echo $kode_otomatis;?>" class="form-control" required="required" />
                                    </div>
                                     <label>Nip</label>
                                    <select name="nip"class="form-control" required="required" autofocus="on">
                                      <option value="" selected="selected">pilih Guru</option>
                                       <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM guru ORDER BY nip ASC");
                                    //if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['nip'].'>'.$row1['nip'].' - '.$row1['nama_gr'].'</option>'; }
                                   
                                    ?>
                                      </select>
                                     <label>Kelas</label>
                                     <select name="id_kls" class="form-control" required="required">
                                      <option value="" selected="selected">pilih Kelas</option>
                                       <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM kelas ORDER BY id_kls ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_kls'].'>'.$row1['kls'].'</option>'; }
                                    //}
                                    ?>
                                      </select>
                                 
                                     <label>Tahun</label>
                                     <select name="id_thn" id="id_thn" class="form-control" required="required">
                                      <option value="" selected="selected">pilih Tahun</option>
                                       <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM thnajar ORDER BY id_thn ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_thn'].'>'.$row1['thn'].'</option>'; }
                                    //}
                                    ?>
                                      </select>
                                          <br/>
                                           <input type="submit" value="simpan" name="submit" class="btn btn-sm btn-primary" />
                                           <a href="walikelas.php" class="btn btn-sm btn-danger">Batal </a>
                                           </div>
                                           </div>
                                         </form>
                                </div>
                            </div>
                        </div>
                    <!-- End Form Elements -->
    </div>
    <?
    }
    ?>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery.js"></script><!-- lib js untuk sweet alert -->
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
      $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0</script>
    
</body>
</html>
