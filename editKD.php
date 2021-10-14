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
<?php
	include "layout/menu.php";
?>
 
    <!-- row -->
    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ubah Data KD-smster </h2> 
                    </div>
              </div>
                <?php 
                    
                $sql =mysqli_query($conn,"SELECT aturan.*, mapelj.nm_mapel, smstr.smstr, thnajar.thn FROM aturan left JOIN mapelj ON aturan.id_mapel = mapelj.id_mapel LEFT JOIN smstr ON aturan.id_smstr = smstr.id_smstr LEFT JOIN thnajar ON aturan.id_thn = thnajar.id_thn WHERE id_aturan='$_GET[kd]'");
                $row1 = mysqli_fetch_array($sql);
                  ?>
                   <form class="" action="update-KD.php" method="post" name="form1" id="form1">
                <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                             <form role="form">
                                  <div class="form-group"> 
                                  <label>ID KD</label>
                                  <input name="id_aturan" type="text" id="$kode_otomatis" class="form-control"value="<?php echo $row1['id_aturan']; ?>"  readonly />
                                   </div>
                                     <div class="form-group">
                                     <label>Mata Pelajaran</label>
                                    <input type="text" name="id_mapel" id="id_mapel" value="<?php echo $row1['id_mapel'] ; ?>" class="form-control" autofocus="on"  />
                                      </div>
                                     <div class="form-group">
                                     <label>Semester</label>
                                    <input type="text" name="id_smstr" id="id_smstr" value="<?php echo $row1['id_smstr']; ?>" class="form-control" />
                                      </div>

                                <div class="form-group">
                                   <label>Tahun Pelajaran</label>
                                    <select name="id_thn"class="form-control" required="required">
                                      <option value="" selected="selected">pilih kelas</option>
                                        <?php
                                    $sql = mysqli_query($conn,"SELECT * FROM thnajar ORDER BY id_thn ASC");
                                   // if(mysqli_num_rows($sql) != 0){
                                    while($row1 = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$row1['id_thn'].'>'.$row1['thn'].'</option>'; }
                                    //}
                                    ?>
                                    </select>
                                    </div>
                                  <label>Diskripsi KD1</label>
                                    <input name="kd1" class="form-control" id="kd1" value="<?php echo $row1['kd1'];?>" required />
                                    <label>Diskripsi KD2</label>
                                    <input name="kd2" class="form-control" id="kd2" value="<?php echo $row1['kd2'];?>"required />
                                    <label>Diskripsi KD3</label>
                                    <textarea name="kd3"  type="text" id="kd3" class="form-control" value="<?php echo $row1['kd3'];?>" required/></textarea>
                                    <label>Diskripsi KD4</label>
                                    <input name="kd4"  type="text" id="kd4" class="form-control" value="<?php echo $row1['kd4'];?>" required/>
                                    <label>Diskripsi KI1</label>
                                    <input name="ki1"  type="text" id="ki1" class="form-control"  value="<?php echo $row1['ki1'];?>"
                                    <label>Diskripsi KI2</label>
                                    <input name="ki2"  type="text" id="ki2" class="form-control"  value="<?php echo $row1['ki2'];?>" required/>
                                    <label>Diskripsi KI3</label>
                                    <input name="ki3"  type="text" id="ki3" class="form-control"  value="<?php echo $row1['ki3'];?>"
                                    <label>Diskripsi KI4</label>
                                    <input name="ki4"  type="text" id="ki4" class="form-control"  value="<?php echo $row1['ki4'];?>" required/>
        
                                    <input type="submit" value="Ubah" class="btn btn-sm btn btn-primary" name="submit" />
                                    <a href="KD.php" class="btn btn-sm btn-danger">Batal </a></input>
                                    </form>
                                </div>
                              </div> 
                            </div>
                           </form>
                        </div>

                        <?php
                      }
                    ?>
                           


  <?php
    include "layout/footer.php";
  ?>
  
</body>
</html>