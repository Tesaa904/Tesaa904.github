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
                  ?>  
                    <div class="col-lg-12">
                    <h2>Edit Data Nilai Perkembangan Siswa</h2>   
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
                        <a href="kembang.php" class="btn btn-sm btn-danger">Batal </a>
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
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>nama</th>
                                    <th>ekskul</th>
                                    <th>Prestasi</th>
                                    <th>Ket</th>
                                    <th>Penglihatan </th>
                                    <th>Kes. Gigi </th>
                                    <th>Pendengaran </th>
                                    <th>Tinggi </th>
                                    <th>Berat </th>
                                  </tr>
                                </thead>
                                 <tbody id="konten">
                                  <?php
                                      $no=0;

                                      $sql_nilai = mysqli_query($conn,"SELECT a.id_kem,d.kls,a.nis,b.nama,e.smstr,f.thn,c.nm_ektra,a.prestasi,a.ket,a.lihat,a.gigi,a.dengar,a.tinggi,a.berat,
																c.id_ektra
                                                                FROM perkem a 
                                                                INNER JOIN murid b ON a.nis=b.nis
                                                                INNER JOIN eksktra c ON a.id_ektra=c.id_ektra
                                                                INNER JOIN kelas d ON a.id_kls = d.id_kls
                                                                INNER JOIN smstr e ON a.id_smstr = e.id_smstr
                                                                inner join thnajar f on a.id_thn = f.id_thn
                                                                WHERE a.id_kls='$get_kelas' AND a.id_thn='$get_tahun' AND a.id_smstr='$get_semester'");
									   $jml_data = mysqli_num_rows($sql_nilai);
                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                         
                                              ?>
										<tr>
                                            <td><?php echo $no; ?> <input type="hidden" class="form-control" name="id_kem[]" value="<?php echo $nilai['id_kem'];?>" autocomplete="off"></td>
                                            <td><?php echo $nilai['nis'];?></td>
                                            <td><?php echo $nilai['nama']; ?></td>
                                            <td width="15%">
												<select class="form-control" name="ekstra[]">
													<?php 
														$sql_eks = mysqli_query($conn,"select * from eksktra order by id_ektra asc");
														while ($eks = mysqli_fetch_array($sql_eks)){
															if ($eks['id_ektra']==$nilai['id_ektra'])
																$pil_eks = "selected";
															else
																$pil_eks="";
															echo "<option value='$eks[id_ektra]' $pil_eks>$eks[nm_ektra]</option>";
														}
													?>
												</select>
											</td>
                                            <td><input type="text" class="form-control" name="prestasi[]" value="<?php echo $nilai['prestasi'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="ket[]" value="<?php echo $nilai['ket'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="lihat[]" value="<?php echo $nilai['lihat'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="gigi[]" value="<?php echo $nilai['gigi'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="dengar[]" value="<?php echo $nilai['dengar'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="tinggi[]" value="<?php echo $nilai['tinggi'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="berat[]" value="<?php echo $nilai['berat'];?>" autocomplete="off"></td>
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
                                </div>
                              </div>

		  <?php
				if (isset($_POST['simpan'])){
					for ($n=0;$n<=($jml_data-1);$n++){
						$rr = "update perkem set id_ektra='".$_POST['ekstra'][$n]."',prestasi='".$_POST['prestasi'][$n]."',ket='".$_POST['ket'][$n]."',
						lihat='".$_POST['lihat'][$n]."',gigi='".$_POST['gigi'][$n]."',dengar='".$_POST['dengar'][$n]."',tinggi='".$_POST['tinggi'][$n]."',
						berat='".$_POST['berat'][$n]."' where id_kem='".$_POST['id_kem'][$n]."'";
						$sql_save = mysqli_query($conn,"$rr");
					}		
					if ($sql_save){
						echo "<script>window.location.href='kembang.php?kelas=$get_kelas&tahun=$get_tahun&semester=$get_semester&alert=1'</script>";
					}
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
         <! --/wrapper -->
     <!-- /MAIN CONTENT -->
       <?php
    include "layout/footer.php";
  ?>

</body>
</html>
