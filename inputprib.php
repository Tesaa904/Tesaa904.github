 <?php 
 session_start();
 if(!isset($_SESSION['username'])){
  header("location:login.php");
 }

 if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }else{
  
     include('koneksi.php'); 
    }
    //include("option_siswa.php");
   // @include "asset/mysql.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
  include "layout/header.php"; //tampilan layout
?>
</head>
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
<!-- ============================================================= -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                <h2>INPUT NILAI KEPRIBADIAN SISWA</h2> 
                </div>
                </div>  
                   
                 <!-- /. ROW  -->
                <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                             <form action="inputprib.php"  method="post">
                             <div class="col-md-4">
                                 <div class="form-group">
                                      <label>Kelas</label>
                                       <span class="inputan">
                                        <select name="kelas" id="kls"  class="form-control"/>
                                        
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
                                          </span>
                                         <label>Tahun</label>
                                         <select class="form-control" name="tahun">
                                        
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
                                          <input type="submit" value="Cari Siswa" name="cari" class="btn btn-sm btn-primary" />&nbsp;
                                               <a href="prib.php" class="btn btn-sm btn-danger">Batal </a>
                                           </form>
                                      </div>
                                      </div>

                                        <div="table-responsive">
                                  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>NISN</th>
                                          <th>Nama</th>
                                          <th>Sakit</th>
                                          <th>Ijin</th>
                                          <th>Alpha</th>
                                        </tr>
                                      </thead>
                                      <tbody>
										                  <form method="POST" action="inputprib_proses.php">
                                          <?php
                                            if (isset($_POST['cari'])){
                  												  $post_kelas=$_POST['kelas'];
                  												  $post_tahun=$_POST['tahun'];
                  												  $post_semester = $_POST['semester'];
                  												  $no = 0;
                  												  $sql_siswa = mysqli_query($conn,"SELECT a.id_kls,a.nis,b.nama
                  																				  FROM det_kls a INNER JOIN murid b ON a.nis=b.nis
                  																				  WHERE a.id_kls='$post_kelas' AND a.id_thn='$post_tahun'");
                  												  $count_siswa = mysqli_num_rows($sql_siswa);
                  												 
                  												  while($siswa = mysqli_fetch_array($sql_siswa)){
                  													$no++;
                													  echo "<tr>
                														<td>$no<input type='hidden' name='id_pribadi[]' value='$prib[id_pribadi]' class='form-control'></td>
                														<td><input type='text' name='nis[]' value='$siswa[nis]' class='form-control' readonly='readonly'><input type='hidden' name='thn[]' value='$post_tahun' class='form-control' readonly='readonly'></td>
                														<td><input type='text' name='nama' value='$siswa[nama]' class='form-control' readonly='readonly'></td>
                														<td><input type='text' name='sakit[]' class='form-control'></td>
                														<td><input type='text' name='ijin[]' class='form-control'></td>
                														<td><input type='text' name='alpha[]' class='form-control'></td>
                													  </tr>";
                												  }
                												echo " <td colspan='11' style='text-align: right;'><input type='submit' value='Simpan' name='simpan' class='btn btn-primary'></td>";
                												echo "<input type='hidden' name='jml' value='$count_siswa'>
                													<input type='hidden' name='id_kel' value='$post_kelas'>
                													<input type='hidden' name='id_thn' value='$post_tahun'>
                													<input type='hidden' name='id_sem' value='$post_semester'>";
                											}												
                                      ?>
										                  </form>
									                 </tbody>
                                  </table>
                                  </div>
                                  </div>
                                 
                            </div>
                         </div>
                         
                       

                         
                        
 <?php
    include "layout/footer.php";
  ?>
    
    <!-- lib js untuk sweet alert -->


</body>
</html>



