<?php 
 session_start();
 if(!isset($_SESSION['username'])){
  header("location:login.php");
 }

 if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }else{
 
include('koneksi.php'); 
//session login di php

  // cek apakah yang mengakses halaman ini sudah login
 
  ?>
<!DOCTYPE html>
<html xmlns>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistem Informasi Penilaian Siswa">
    <meta name="author" content="">
    <meta name="keyword" content="">

    <title>SD kanisius 1 Murukan</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
      
    <link href="assets/css/style-responsive.css" rel="stylesheet">
 
</head>

<body>
    <div id="wrapper">
               <?php
  include "layout/navbar.php"; 
  
  include "layout/menu.php";    // tampilan menu
?>
            
        </nav>
      
     <div id="page-wrapper" >
            <div id="page-inner">
                    <div class="col-lg-12">
                    <h2>Daftar Data Siswa</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     
                     <form method="POST" action="">
                      <label>Tahun Ajaran</label>
                      <select name="tahun" class="form-control">
                      <option>  --Pilih Tahun--  </option>
                         <?php
                          $sql_tahun = mysqli_query($conn,"Select * from thnajar order by id_thn asc");
                          while ($tahun=mysqli_fetch_array($sql_tahun)){
                              if ($tahun['id_thn']==$_POST['tahun'])
                                $pil_thn = "selected";
                              else
                                $pil_thn="";
                              echo "<option value='$tahun[id_thn]' $pil_thn>$tahun[thn]</option>";
                          }
                        ?>
                      </select>
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
                          <br/>
                    </div>
                    <div class="text-right">
                    <input type="submit"  name="cari"  value="Cari Data"class="btn btn-sm btn-primary" align="right" /> <a href='laporsiswa.php' class="btn btn-sm btn-success" align="right"><i class="glyphicon glyphicon-refresh"></i> Refresh</i></a>
                    </div>
                    <br/>
                    <br/>
                    <!-- BASIC FORM ELELEMNTS -->
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
                      <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>NISN </th>
                        <th>Nama Siswa</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir </th>
                        <th>Jenis Kelamin </th>
                        <th>Agama </th>
                        <th>Alamat </th>
                        <th>Tahun Angkat</th>
                        <th>Nama Orang Tua</th>
                      </tr>
                       </thead>
                       <tbody>
                                   <?php
                                    if (isset($_POST['cari'])){
                                      $post_tahun = $_POST['tahun'];
                                      $post_kelas = $_POST['kelas'];
                                      $sql_nilai = mysqli_query($conn,"SELECT d.kls, a.nis, b.nama, b.tmp_lahir, b.tgl_lahir, b.jenis_kl, b.agama, b.alamat, b.thn_angkt, b.nama_ortu FROM det_kls a
                                      INNER JOIN murid b ON a.nis=b.nis
                                      INNER JOIN kelas d ON a.id_kls=d.id_kls
                                      INNER JOIN thnajar c ON a.id_thn=c.id_thn 
                                      WHERE a.id_thn='$post_tahun' and a.id_kls='$post_kelas'");
                                       $no=0;
                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                        ?>
                                    <tr>
                                    <td><?php echo $no; ?> </td>
                                     <td><?php echo $nilai['kls'];?></td>
                                    <td><?php echo $nilai['nis'];?></td>
                                    <td><?php echo $nilai['nama'];?></td>
                                    <td><?php echo $nilai['tmp_lahir']; ?></td>
                                    <td><?php echo $nilai['tgl_lahir']; ?></td>
                                    <td><?php echo $nilai['jenis_kl']; ?></td>
                                    <td><?php echo $nilai['agama']; ?></td>
                                    <td><?php echo $nilai['alamat']; ?></td>
                                    <td><?php echo $nilai['thn_angkt']; ?></td>
                                    <td><?php echo $nilai['nama_ortu']; ?></td>
                                    </tr>

                                <?
                             }
                           }
                           ?>
                               </tbody>      
                               </table>
                               <div class="text-right">
                                <a href="laporan/cetak_siswapdf.php?tahun=<?php echo $post_tahun;?>&kelas=<?php echo $post_kelas;?>" target="_new" class="btn btn-sm btn-info">Cetak <i class="fa fa-print"></i></a>
                                   </td>
                                </div><!-- col-lg-12--> 
                               </div>
                           </div> 
                           </div>
                           </div>
                          </div>
                          </form>
                             </div>
                              </div>
                              <?
                            }
                            ?>
                             </div> 
        <!-- /MAIN CONTENT -->
     <?php
    include "layout/footer.php";
  ?>

  </body>
</html>
