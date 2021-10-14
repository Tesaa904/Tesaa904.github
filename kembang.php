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
<head>
    <?php
  include "layout/header.php"; //tampilan layout
?>
</head>
<body>
    <div id="wrapper">
 <?php
  include "layout/navbar.php"; 
 include "layout/menu.php";    // tampilan menu
?>
            
        </nav>
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
       <?php
            include "alert.php";//
          ?>
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    
                    <div class="col-lg-12">
                    <h2>Daftar Data Nilai Perkembangan Siswa</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <a href="inputkembang.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah nilai</a>
                    </div>

                       <!--</div>-->
                        <div class="text-center">
                    <div class="row mt">
                     <div class="col-lg-4">
                  <form method="POST" actio="">
                      <table>Kelas</table>
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
                      <table>Tahun Ajaran</table>
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
                      <table>Semester</table>
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
                      <input type='submit' value='Cari Data' name="cari" class="btn btn-sm btn-danger" /> 
                      <a href='kembang.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </form>
                  </div>
                 </div>
                  </div>
                      
                      
                           <br />
                        <div class="row mt">
                      <div class="col-lg-12">
                    <div class="panel panel-success">
                    <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user"></i></h3> 
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                         <table class="table table-bordered table-hover table-striped tablesorter">
                       <thead>
                                 
                              <th><a href="editkembang.php?kelas=<?php echo $_POST['kelas'];?>&tahun=<?php echo $_POST['tahun'];?>&semester=<?php echo $_POST['semester'];?>" class="btn btn-primary">Edit Data</a></th>
                                 
                                  <tr>
                                    <th width="2%">No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Ekskul</th>
                                    <th>Prestasi</th>
                                    <th>Ket</th>
                                    <th>Penglihatan </th>
                                    <th>Kes. Gigi </th>
                                    <th>Pendengaran </th>
                                    <th>Tinggi </th>
                                    <th>Berat </th>
                                     <th>Opsi</th>
                                  </tr>
                                </thead>
                                 <tbody id="konten">
                                  <?php
                                    if (isset($_POST['cari'])){
                                      $post_kelas = $_POST['kelas'];
                                      $post_tahun = $_POST['tahun'];
                                      $post_semester = $_POST['semester'];
                                      $no=0;

                                      $sql_nilai = mysqli_query($conn,"SELECT a.id_kem,d.kls,a.nis,b.nama,e.smstr,f.thn,c.nm_ektra,a.prestasi,a.ket,a.lihat,a.gigi,a.dengar,a.tinggi,a.berat
                                                                FROM perkem a 
                                                                INNER JOIN murid b ON a.nis=b.nis
                                                                INNER JOIN eksktra c ON a.id_ektra=c.id_ektra
                                                                INNER JOIN kelas d ON a.id_kls = d.id_kls
                                                                INNER JOIN smstr e ON a.id_smstr = e.id_smstr
                                                                inner join thnajar f on a.id_thn = f.id_thn
                                                                WHERE a.id_kls='$post_kelas' AND a.id_thn='$post_tahun' AND a.id_smstr='$post_semester'");

                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                              ?>
                                          <tr>
                                            <td><?php echo $no; ?><input type="hidden" class="form-control" name="id_kem[]" value="<?php echo $nilai['id_kem'];?>" autocomplete="off"></td>
                                            <td><?php echo $nilai['nis'];?></td>
                                            <td><?php echo $nilai['nama']; ?></td>
                                            <td><?php echo $nilai['nm_ektra']; ?></td>
                                            <td><?php echo $nilai['prestasi']; ?></td>
                                            <td><?php echo $nilai['ket'];?></td>
                                            <td><?php echo $nilai['lihat'];?></td>
                                            <td><?php echo $nilai['gigi']; ?></td>
                                            <td><?php echo $nilai['dengar']; ?></td>
                                            <td><?php echo $nilai['tinggi']; ?></td>
                                            <td><?php echo $nilai['berat'];?></td>
                                             <td align="center">
                                                      <a href="hapuskembang.php?kem=<?php echo $nilai['id_kem'];?>">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a>
                                            </td>
                                        </tr>
                                                      <?
                                      }
                                    }
                                  ?>
                            </tbody>
                            </table>
                            </div>
                           
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>
                            </div>
                            </div>
                           

                            <?
                            }
                            ?>

                            </div>
                            </div>
                            </div>
                            </div>

    <?php
include "layout/footer.php";
?>


</body>
</html>
