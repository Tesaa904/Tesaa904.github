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
    
<?php
  include "layout/navbar.php";  //tampilan navbar
  include "layout/menu.php";    // tampilan menu
?>
        </nav>  
       <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
 <?php
            include "alert.php";
 ?>
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-12">
                    <h2>Daftar Data Nilai Sosial & Spiritual</h2>   
                     <div class="box box-primary">
                     <div class="box-header with-border">
                        </div>
                          <a href="input_nilai_sos.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah nilai</a>
                            </div>

                       <!--</div>-->
                      
                        <div class="row mt">
                         <div class="col-lg-4">
                            <form method="POST" action="">
                              <label>Kelas</label>
                              <select name="kelas" class="form-control">
                                  <option>  --Pilih Kelas--  </option>
                                    <?php
                                              $sql_kelas = mysqli_query($conn,"Select * from kelas order by id_kls asc");
                                              while ($kelas=mysqli_fetch_array($sql_kelas)){
                                                  if ($kelas['id_kls']==$_POST['kelas'])
                                                    $pil_kelas = "selected";
                                                  else
                                                    $pil_kelas="";
                                                  echo "<option value='$kelas[id_kls]' $pil_kelas>$kelas[kls]</option>";
                                              }
                                            ?>
                                </select>
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                   <option> --Pilih Tahun--  </option>
                                    <?php
                                              $sql_tahun = mysqli_query($conn,"Select * from thnajar order by id_thn asc");
                                              while ($tahun=mysqli_fetch_array($sql_tahun)){
                                                if ($tahun['id_thn']==$_POST['tahun'])
                                                  $pil_tahun = "selected";
                                                else
                                                  $pil_tahun="";
                                                  echo "<option value='$tahun[id_thn]' $pil_tahun>$tahun[thn]</option>";
                                              }
                                            ?>
                                </select>
                                <label>Semester</label>
                                <select name="semester" class="form-control">
                                  <option> --Pilih Semeter--  </option>
                                    <?php
                                          $sql_smstr = mysqli_query($conn,"Select * from smstr order by id_smstr asc");
                                          while ($smstr=mysqli_fetch_array($sql_smstr)){
                                            if ($smstr['id_smstr']==$_POST['semester'])
                                              $pil_sem = "selected";
                                            else
                                              $pil_sem = "";
                                              echo "<option value='$smstr[id_smstr]' $pil_sem>$smstr[smstr]</option>";
                                          }
                                        ?>
                                </select>
                                  <br/>
                                  <input type="submit" value="Cari Data" name="cari" class="btn btn-sm btn-danger" /> 
                                  <a href='nilai_sos_spirit.php'  class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"></i>Refresh</a>
                            </form>
                         
                       </div>
                    </div>
                   <div class="row mt">
                    <div class="col-lg-12">
                     <div class="panel panel-success">
                        <div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                            </div>
                          <div class="panel-body">
                          <div class="table-responsive">
                           <table class="table table-bordered table-hover table-striped tablesorter">
                           <tr>
                          <th><a href="editnilai_sos_spirit.php?kelas=<?php echo $_POST['kelas'];?>&tahun=<?php echo $_POST['tahun'];?>&semester=<?php echo $_POST['semester'];?>" class="btn btn-primary">Edit Data</a></th>
                          </tr> 
                          <div class="form-group">
                               <table border="0" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
								  <thead>
									<tr>
										<th rowspan="2" style="text-align:center;vertical-align:middle">No</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle">NISN</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle">Nama</th>
										<th colspan="2" style="text-align:center;vertical-align:middle">Sosial</th>
										<th colspan="2" style="text-align:center;vertical-align:middle">Spiritual</th>
									</tr>
									<tr>
										<th style="text-align:center;vertical-align:middle">SB</th>
										<th style="text-align:center;vertical-align:middle">PB</th>
										<th style="text-align:center;vertical-align:middle">SB</th>
										<th style="text-align:center;vertical-align:middle">PB</th>	
                    <th colspan="2" style="text-align:center;vertical-align:middle">Opsi</th>										
									</tr>

								  </thead>
                                <tbody>
                                  <?php
                                    if (isset($_POST['cari'])){
                                      $post_kelas = $_POST['kelas'];
                                      $post_tahun = $_POST['tahun'];
                                      $post_semester = $_POST['semester'];

                                      $sql_nilai = mysqli_query($conn,"SELECT a.*,b.nama,d.thn,e.smstr,f.kls FROM nilai_sos_sp a 
															INNER JOIN murid b ON a.nis=b.nis
															INNER JOIN thnajar d ON a.`id_thn`=d.id_thn INNER JOIN smstr e ON a.id_smstr = e.id_smstr
															INNER JOIN kelas f ON a.`id_kls`=f.id_kls
															WHERE a.id_kls='$post_kelas' AND a.id_thn='$post_tahun' AND a.id_smstr='$post_semester'");
                                       $no=0;
                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                        ?>
                                         <tr>
                                            <td><?php echo $no; ?><input type="hidden" class="form-control" name="id_nilai_sos_sp[]" value="<?php echo $nilai['id_nilai_sos_sp'];?>" autocomplete="off"> </td>
                                            <td><?php echo $nilai['nis'];?></td>
                                            <td><?php echo $nilai['nama'];?></td>
                                            <td><?php echo $nilai['nil_sossb']; ?></td>
                                            <td><?php echo $nilai['nil_sospb']; ?></td>
                                            <td><?php echo $nilai['nil_sprtsb']; ?></td>
                                            <td><?php echo $nilai['nil_sprtpb']; ?></td>
                                             <td align="center">
                                              <a href="hapusnil_sos.php?nil=<?php echo $nilai['id_nilai_sos_sp'];?>">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a>
                                            </td>
                                         </tr>
                                        <?php
                                        }
                                      }
                                      ?>                    
                                </tbody>
                              </table>
                              </div>
                             </div>
                             </table>
                             </div>                          
                          <?
                          }
                          ?>
                    </div>
                   </div>
                  </div>
                </div>         
        
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  <?php
    include "layout/footer.php";
  ?>

</body>
</html>
