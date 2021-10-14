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
                    <h2>Edit Data Nilai Perilaku Sosial dan Spiritual Siswa</h2>   
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
                                    <th rowspan="2" style="text-align:center;vertical-align:middle">No</th>
                                    <th rowspan="2" style="text-align:center;vertical-align:middle">NIS</th>
                                    <th rowspan="2" style="text-align:center;vertical-align:middle">Nama</th>
                                    <th colspan="2" style="text-align:center;vertical-align:middle">Sosial</th>
                                    <th colspan="2" style="text-align:center;vertical-align:middle">Spiritual</th>
                                  </tr>
                                  <tr>
                                    <th style="text-align:center;vertical-align:middle">SB</th>
                                    <th style="text-align:center;vertical-align:middle">PB</th>
                                    <th style="text-align:center;vertical-align:middle">SB</th>
                                    <th style="text-align:center;vertical-align:middle">PB</th>                     
                                  </tr>
                                </thead>
                                 <tbody id="konten">
                                  <?php
                                      $no=0;

                                      $sql_nilai = mysqli_query($conn,"SELECT a.id_nilai_sos_sp,d.kls,a.nis,b.nama,e.smstr,f.thn,a.nil_sossb,a.nil_sospb,a.nil_sprtsb,a.nil_sprtpb
                                        FROM nilai_sos_sp a 
                                        INNER JOIN murid b ON a.nis=b.nis
                                        INNER JOIN kelas d ON a.id_kls = d.id_kls
                                        INNER JOIN smstr e ON a.id_smstr = e.id_smstr
                                        INNER JOIN thnajar f ON a.id_thn = f.id_thn
                                        WHERE a.id_kls='$get_kelas' AND a.id_thn='$get_tahun' AND a.id_smstr='$get_semester'
                                        ");
                                              $jml_data = mysqli_num_rows($sql_nilai);
                                              while ($nilai = mysqli_fetch_array($sql_nilai)){
                                              $no++;
                                                ?>
                                              <tr>
                                              <td><?php echo $no; ?> <input type="hidden" class="form-control" name="id_nilai_sos_sp[]" value="<?php echo $nilai['id_nilai_sos_sp'];?>" autocomplete="off"></td>
                                              <td><?php echo $nilai['nis'];?></td>
                                              <td><?php echo $nilai['nama']; ?></td>
                                            <td><input type="text" class="form-control" name="nil_sossb[]" value="<?php echo $nilai['nil_sossb'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="nil_sospb[]" value="<?php echo $nilai['nil_sospb'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="nil_sprtsb[]" value="<?php echo $nilai['nil_sprtsb'];?>" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="nil_sprtpb[]" value="<?php echo $nilai['nil_sprtpb'];?>" autocomplete="off"></td>
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
						$rr = "update nilai_sos_sp set nil_sossb='".$_POST['nil_sossb'][$n]."',nil_sospb='".$_POST['nil_sospb'][$n]."',nil_sprtsb='".$_POST['nil_sprtsb'][$n]."',
						nil_sprtpb='".$_POST['nil_sprtpb'][$n]."' where id_nilai_sos_sp='".$_POST['id_nilai_sos_sp'][$n]."'";
						$sql_save = mysqli_query($conn,"$rr");
					}		
					if ($sql_save){
						echo "<script>window.location.href='nilai_sos_spirit.php?kelas=$get_kelas&tahun=$get_tahun&semester=$get_semester&alert=1'</script>";
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
