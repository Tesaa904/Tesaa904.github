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

    <!-- row -->
    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ubah Data Kelas</h2> 
                    </div>
                     </div>
                       <?php
            $query = mysqli_query($conn,"SELECT det_kls.id_det_kls, kelas.kls, murid.nis, murid.nama, thnajar.thn FROM det_kls
                    LEFT JOIN kelas ON det_kls.id_kls = kelas.id_kls 
                    LEFT JOIN murid ON det_kls.nis = murid.nis
                    LEFT JOIN thnajar ON det_kls.id_thn = thnajar.id_thn
                     WHERE id_det_kls='$_GET[kd]'");
                                $row1  = mysqli_fetch_array($query);
                                ?>
                <form class="" action="update-kls.php" method="post"name="form1" id="form1">   
                <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                         <form role="form">
                        </div>
                          <div class="form-group">
                              <label>ID Detail Kelas</label>
                              
                                  <input name="id_det_kls" type="text" id="$kode_otomatis" class="form-control"value="<?php echo $row1['id_det_kls'];?>" autofocus="on" readonly />
                              </div>
                               <div class="form-group">
                              <label>NISN</label>
                            
                                  <input name="nis" type="text" id="nis" class="form-control" value="<?php echo $row1['nis'];?>" readonly />
                              </div>
                        
                           <div class="form-group">
                              <label>Nama Siswa</label>
                              
                                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row1['nama'];?>" readonly />
                              </div>
                       
                                 <div class="form-group">
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
                                    </div>
                                   
                                   <div class="form-group">
                                   <label>Tahun</label>
                                     <select name="id_thn" class="form-control" required="required">
                                      <option value="" selected="selected">Pilih Tahun</option>
                                       <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM thnajar ORDER BY id_thn ASC");
                                    //if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_thn'].'>'.$row1['thn'].'</option>'; }
                                   // }
                                    ?>
                                      </select>
                                      </div>
                                    <input type="submit" value="Ubah" class=" btn btn-sm btn btn-primary" name="simpan" />
                                    <a href="kelas.php" class="btn btn-sm btn-danger">Batal </a></input>
                                    </form>
                                </div>
                               </div>
                              </div> 
                            </div>
                            <?php
                          }
                          ?>

<?php
    include "layout/footer.php";
  ?>
    
</body>
</html>