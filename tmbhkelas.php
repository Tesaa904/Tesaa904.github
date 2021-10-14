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
<?
$carikode = mysqli_query($conn, "SELECT id_det_kls from det_kls") or die (mysqli_error());
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
   $kode_otomatis = "dk".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "dk001";
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
        
             <?php
  include "layout/menu.php";    // tampilan menu
?>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tambah Data kelas</h2> 
                       
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
                             <form class="" action="functionkls.php"   method="POST" enctype="multipart/form-data" name="form1" id="form1">

                                <div class="form-group">
                              <label>ID Detail Kelas</label>
                                 <input name="id_det_kls" type="text" id="kode_otomatis" value="<?php echo $kode_otomatis;?>" class="form-control" required="required" />
                              </div>
                                     <label>kelas</label>
                                    <select name="id_kls"class="form-control" required="required">
                                      <option value="" selected="selected" autofocus="on">pilih kelas</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM kelas ORDER BY id_kls ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_kls'].'>'.$row1['kls'].'</option>'; }
                                    //}
                                    ?>
                                      </select>
                                     <label>Siswa</label>
                                     <select name="nis" class="form-control" required="required">
                                      <option value="" selected="selected" readonly="readonly">pilih siswa</option>
                                       <?php
                                         $sql = mysqli_query($conn,"SELECT * FROM murid ORDER BY nis ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['nis'].'>'.$row1['nama'].'</option>'; }
                                    //}
                                      ?>
                                      </select>
                                 
                                     <label>Tahun</label>
                                     <select name="id_thn" class="form-control" required="required">
                                      <option value="">pilih Tahun</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM thnajar ORDER BY id_thn ASC");
                                    //if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_thn'].'>'.$row1['thn'].'</option>'; }
                                   // }
                                    ?>
                                      </select>
                                            <br/>
                                           <input type="submit" value="simpan" name="submit" class="btn btn-sm btn-primary" />
                                           <a href="kelas.php" class="btn btn-sm btn-danger">Batal </a>
                                           </div>
                                           </div>
                                         </form>
                                </div>
                            </div>
                        </div>
                        </div>
                          <?
                        }
                        ?>
                    <!-- End Form Elements -->

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
