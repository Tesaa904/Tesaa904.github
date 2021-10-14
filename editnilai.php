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
  
  include "layout/menu.php";    // tampilan menu
?> 
            
        </nav>
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <div class="panel-heading">
                  <?php
					include "alert.php";
					
                    $get_kelas = $_GET['kelas'];
                    $get_tahun = $_GET['tahun'];
                    $get_semester=$_GET['semester'];
                    $get_mapel = $_GET['mapel'];
                  ?>  
                    <div class="col-lg-12">
                    <h2>Edit Data Nilai Mata Pelajaran Siswa</h2>   
                   <div class="box box-primary"> 
                     <div class="box-header with-border"> 
                     </div>

                       <!--</div>-->
                        <div class="text-center">
                    <div class="row mt">
                     <div class="col-lg-4">
                     <br/>
                      <br/>
                          <tr>
                            <td style="text-align:right">Kelas:</td><td><input type="text" class="form-control" value="<?php echo nama_kelas($get_kelas);?>" readonly></td>
                          </tr>
                          <tr>
                            <td style="text-align:right">Tahun Ajar:</td><td><input type="text" class="form-control" value="<?php echo nama_tahun($get_tahun);?>"readonly></td>
                          </tr>
                          <tr>
                         
                            <td style="text-align:right">Semester:</td><td><input type="text" class="form-control" value="<?php echo nama_sem($get_semester);?>"readonly></td>
                          </tr>
                           <tr>
                         
                            <td style="text-align:right">Mata Pelajaran:</td><td><input type="text" class="form-control" value="<?php echo nama_mapel($get_mapel);?>"readonly></td>
                          </tr>
                       
                        <a href="nilai.php" class="btn btn-sm btn-danger">Batal </a>
                        </div>
                       </div>
                       </div>
                      
                      
                           <br />
                       <div class="row mt">
                     <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                            <div class="form-group">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                                <form method="POST" action="">
								<thead>
                                  <tr>
                                   <tr>
                                  <th rowspan="2" style="text-align:center;vertical-align:middle">No</th>
                                  <th rowspan="2" style="text-align:center;vertical-align:middle">NIS</th>
                                  <th rowspan="2" style="text-align:center;vertical-align:middle">Nama</th>
                                  <th colspan="2" style="text-align:center;vertical-align:middle">Nilai</th>
                                </tr>
                                <tr>
                                  <th style="text-align:center;vertical-align:middle">KD</th>
                                  <th style="text-align:center;vertical-align:middle">KI</th>                     
                                </tr>
                               </tr>
                                </thead>
                                 <tbody id="konten">
                                  <?php
                                  $no = 0;
                                  $sql_nilai = mysqli_query($conn,"SELECT a.id_nilai, b.nama, c.nm_mapel, d.thn, a.nis,
									e.smstr, g.kls, a.nilkd, a.nilki, a.indikator_kd, a.indikator_ki, f.id_aturan 
                                    FROM nilai a
                                    INNER JOIN murid b ON a.nis=b.nis
                                    INNER JOIN mapelj c ON a.id_mapel= c.id_mapel
                                    INNER JOIN thnajar d ON a.id_thn=d.id_thn
                                    INNER JOIN smstr e ON a.id_smstr=e.id_smstr
                                    INNER JOIN aturan f ON a.id_aturan=f.id_aturan
                                    INNER JOIN kelas g ON a.id_kls=g.id_kls
                                    WHERE a.id_kls='$get_kelas' AND a.id_thn='$get_tahun' AND a.id_smstr='$get_semester' AND a.id_mapel='$get_mapel'");

                                  $jml_data = mysqli_num_rows($sql_nilai);
									echo "<input type='hidden' name='jml' value='$jml_data'>";
                                  while($nilai = mysqli_fetch_array($sql_nilai))
                                  {
                                  $no++;
                                        ?>
                                          <tr>
											<td><?php echo $no; ?><input type="hidden" class="form-control" name="id_nilai[]" value="<?php echo $nilai['id_nilai'];?>" autocomplete="off"></td>
											<td><?php echo $nilai['nis'];?></td>
											<td><?php echo $nilai['nama']; ?></td>               
                                            <td><input type="text" class="form-control" name="nilkd[]" value="<?php echo $nilai['nilkd'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="nilki[]" value="<?php echo $nilai['nilki'];?>" autocomplete="off"></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                          <tr>
                                          <td style="text-align:right" colspan="11"><input type="submit" name="simpan" value="Ubah Nilai" class="btn btn-primary btn-sm"></td>
                                        </tr>
                                        </tbody>
                                        </form>
                                        </table>
                                        </div>
                          
                                  <?php
									if (isset($_POST['simpan'])){
										$post_id = $_POST['id_nilai'];
										$post_jml = $_POST['jml'];
										
										for ($i=0;$i<=($post_jml-1);$i++){
											//cari predikat KD
											if (($_POST['nilkd'][$i]>=88.34) and ($_POST['nilkd'][$i]<=100)){
												$ind_kd = "A";
											} else if (($_POST['nilkd'][$i]>=76.68) and ($_POST['nilkd'][$i]<=88.33)){
												$ind_kd = "B";
											} else if (($_POST['nilkd'][$i]>=65) and ($_POST['nilkd'][$i]<=76.67)){
												$ind_kd = "C";
											} else if (($_POST['nilkd'][$i]>=0) and ($_POST['nilkd'][$i]<=64.99)){
												$ind_kd = "D";
											}
											
											//cari predikat KI
											if (($_POST['nilki'][$i]>=88.34) and ($_POST['nilki'][$i]<=100)){
												$ind_ki = "A";
											} else if (($_POST['nilki'][$i]>=76.68) and ($_POST['nilki'][$i]<=88.33)){
												$ind_ki = "B";
											} else if (($_POST['nilki'][$i]>=65) and ($_POST['nilki'][$i]<=76.67)){
												$ind_ki = "C";
											} else if (($_POST['nilki'][$i]>=0) and ($_POST['nilki'][$i]<=64.99)){
												$ind_ki = "D";
											}
											
											//simpan ke DB
											$sql_save = mysqli_query($conn,"update nilai set nilkd='".$_POST['nilkd'][$i]."',nilki='".$_POST['nilki'][$i]."',
														indikator_kd='$ind_kd',indikator_ki='$ind_ki' where id_nilai='".$_POST['id_nilai'][$i]."'");		
										}
										if ($sql_save){
											echo "<script>window.location.href='nilai.php?alert=1'</script>";
										}
									}
                                  ?>
                                  </table>
                                  </div>                     
                                  </div>
                                  </div>
                                  
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </nav>
         <! --/wrapper -->
     <!-- /MAIN CONTENT -->
         <?php
    include "layout/footer.php";
}
  ?>


</body>
</html>
