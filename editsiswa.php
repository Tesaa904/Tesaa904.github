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
                     <h2>Ubah Data Siswa</h2> 
                    </div>
              </div>
                 <?php 
                $nis   = $_GET['nis'];          
                 $query = mysqli_query($conn,"SELECT * FROM murid WHERE nis='$nis'");
                while($row1 = mysqli_fetch_array($query)){
                  ?>
                   <form class="" action="update-murid.php" method="post" name="form1" id="form1">
                <div class="row mt">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        
                             <form role="form"> 
                          <div class="form-group">
                              <label class="col-sm-2 control-label">NISN</label>
                                  <input name="nis" type="text" id="nis" class="form-control" value="<?php echo $row1['nis'];?>" readonly />
                                  </div>
                                 <div class="form-group">
                              <label class="col-sm-2 control-label">Nama Siswa</label>                       
                              <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row1['nama'];?>" required autofocus="on" />
                                  </div>
                                          
                                    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                  <input name="tmp_lahir" class="form-control" id="tmp_lahir" type="text" value="<?php echo $row1['tmp_lahir'];?>" required />
                              </div>
                                    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                  <input name="tgl_lahir" class="form-control" id="tgl_lahir" type="date" value="<?php echo $row1['tgl_lahir'];?>" required />
                              </div>
                
                                    <div class="form-group">
                              <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                  <select name="jenis_kl" id="jenis_kl"  class="form-control" required />
                                    <option> <?php echo $row1['jenis_kl'];?> </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                  </div>
                              <div class="form-group">
                              <label class="col-sm-2  control-label">Agama</label>
                              
                                  <select name="agama" id="agama"  class="form-control" required />
                                    <option><?php echo $row1['agama'];?> </option>
                                    <option value="katolik">Katolik</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                  </select>
                                  </div>
                                 
                              <div class="form-group">
                              <label class="col-sm-2  control-label">Alamat</label>
                                  <input name="alamat" type="textarea" id="alamat" class="form-control" value="<?php echo $row1['alamat'];?>" required/>
                                  </div>
                                
                               <div class="form-group">
                              <label class="col-sm-2  control-label">Tahun Angkatan</label>
                                  <input name="thn_angkt" type="text" id="thn_angkt" class="form-control" value="<?php echo $row1['thn_angkt'];?>" required />
                                 </div>
                                     <div class="form-group">
                              <label class="col-sm-2  control-label">Nama Orang Tua</label>
                              
                                  <input name="nama_ortu" type="text" id="nama_ortu" class="form-control" value="<?php echo $row1['nama_ortu'];?>" required />
                                  </div>
                                     <div class="form-group">
                                      <label class="col-sm-2 control-label"></label>
                                    <input type="submit" value="Ubah"class="btn btn-sm btn btn-primary" />&nbsp;
                                    <a href="murid1.php" class="btn btn-sm btn-danger">Batal </a>
                                    </div>
                                    </div>
                                    </form>
                                    <?php
                                  }
                                  ?>
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