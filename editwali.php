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
                     <h2>Ubah Data Wali kelas  </h2> 
                    </div>
              </div>
                <?php 
                    
                $sql =mysqli_query($conn,"SELECT guru.nip, guru.nama_gr, kelas.kls, thnajar.thn, wali_kls.id_wali FROM wali_kls left JOIN guru ON wali_kls.nip = guru.nip LEFT JOIN kelas ON wali_kls.id_kls = kelas.id_kls LEFT JOIN thnajar ON wali_kls.id_thn = thnajar.id_thn WHERE id_wali='$_GET[kd]'");
                $row1 = mysqli_fetch_array($sql);
                  ?>
                   <form class="" action="update-wali.php" method="post" name="form1" id="form1">
                <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                             <form role="form">
                                    <div class="form-group"> 
                                  <label>ID Wali</label>
                                  <input name="id_wali" type="text" id="$kode_otomatis" class="form-control"value="<?php echo $row1['id_wali'];?>"  readonly />
                                   </div>
                                     <div class="form-group">
                                     <label>Nip</label>
                                    <input type="text" name="nip" id="nip" value="<?php echo $row1['nip']; ?>" class="form-control" readonly="readonly" />
                                      </div>
                                     <div class="form-group">
                                     <label>Nama Guru</label>
                                    <input type="text" name="nama_gr" id="nama_gr" value="<?php echo $row1['nama_gr']; ?>" class="form-control" readonly="readonly" />
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
                                      <option value="" selected="selected">pilih Tahun</option>
                                       <?php
                                        include('koneksi.php');
                                        $sql = "SELECT * FROM thnajar";
                                        $result = mysqli_query($conn, $sql);
                                        while($row1=mysqli_fetch_array($result)){
                                          echo "<option value=$row1[id_thn]>$row1[thn]</option>";
                                        }
                                      ?>
                                      </select>
                                      </div>
                                    <input type="submit" value="Ubah" class="btn btn-sm btn-primary" name="submit" />
                                    <a href="walikelas.php" class="btn btn-sm btn-danger">Batal </a></input>
                                    </form>
                                    </div>
                                </div>
                              </div> 
                            </div>
                            <?php
                            }
                            ?>
                          </form>
                        </div>
                      </div>
                  </div>

 <?php
    include "layout/footer.php";
  ?>
  
</body>
</html>