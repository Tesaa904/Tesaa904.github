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
                    <h2>Daftar Data Nilai Raport Siswa</h2>   
            <div class="box box-primary">
              <div class="box-header with-border">
                         <div class="col-lg-4">
                            <form method="POST" action="">
                              <label>Kelas:</label>
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
                                <label>Tahun:</label>
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
                                <label>Semester:</label>
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
                                  <a href='nilai.php'  class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                            </form>
                          </div>                
              </div>
            </div>

                       <!--</div>-->
                      
                    </div>
                    <div class="col-lg-12">
                     <div class="panel panel-success">
                        <div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                            </div>
                          <div class="panel-body">
                          <div class="table-responsive">
                           <table class="table table-bordered table-hover table-striped tablesorter">
                            <div class="form-group">
                               <table border="0" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="text-align:center;vertical-align:middle">No</th>
                    <th style="text-align:center;vertical-align:middle">NISN</th>
                    <th style="text-align:center;vertical-align:middle">Nama</th>
                    <th style="text-align:center;vertical-align:middle">Alamat</th>
                    <th style="text-align:center;vertical-align:middle">Jenis Kelamin</th>
                    <th style="text-align:center;vertical-align:middle">Cetak Raport</th>
                  </tr>
                  </thead>
                                <tbody>
                                  <?php
                                    if (isset($_POST['cari'])){
                                      $post_kelas = $_POST['kelas'];
                                      $post_tahun = $_POST['tahun'];
                                      $post_semester = $_POST['semester'];

                                      $sql_nilai = mysqli_query($conn,"select a.id_det_kls,a.id_kls,a.nis,b.nama,b.alamat,b.jenis_kl
                                  from det_kls a
                                  inner join murid b on a.nis=b.nis
                                  where id_kls='$post_kelas' and id_thn='$post_tahun'");
                                       $no=0;
                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                        ?>
                                         <tr>
                                            <td><?php echo $no; ?> </td>
                                            <td><?php echo $nilai['nis'];?></td>
                                            <td><?php echo $nilai['nama'];?></td>
                                            <td><?php echo $nilai['alamat'];?></td>
                                            <td><?php echo $nilai['jenis_kl'];?></td>
                                            <td style="text-align:center;vertical-align:middle">
                        <a href="laporan/raport_per_siswa.php?nis=<?php echo $nilai['nis'];?>&kelas=<?php echo $post_kelas;?>&tahun=<?php echo $post_tahun;?>&sem=<?php echo $post_semester;?>" target="_new" class="btn btn-sm btn-info">Cetak Raport <i class="fa fa-print"></i></a>
                      </td>
                                         </tr>
                                        <?php
                                        }
                                      }
                                      ?>                    
                                </tbody>
                              </table>
                              </div>
                              </table>
                          </div>
                        </div>
                          
                          <?
                          }
                          ?>
        </div>
        </div>
    
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  <?php
    include "layout/footer.php";
  ?>

</body>
</html>
