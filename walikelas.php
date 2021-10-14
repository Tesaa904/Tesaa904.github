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
         <?php
    include('koneksi.php');
      $nip = isset($_POST['nip'])? $_POST['nip'] : '';
      $id_kls = isset($_POST['id_kls'])? $_POST['id_kls'] : '';
  ?>
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-12">
                    <h2>Daftar Data Walikelas</h2>   
                   <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='walikelas.php' method="POST">
                     <a href="tmbhwali.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan nip' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='walikelas.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </div>
                  </div>
                <br />
                   <!-- </div>-->
                    <!--</div>-->
                    <!-- Advanced Tables -->
                    <div class="row mt">
                     <div class="col-lg-12">
                      <!--  <div class="content-box-large"> -->
                        <div class="panel panel-success">
                         <div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                         <tbody>
                           <?php
                            $sql="select * from wali_kls";

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $sql="SELECT * FROM  wali_kls 
                                   where id_wali like '%$qcari%'
                                   or nip like '%$qcari%'";
                                    }
                                    $tampil=mysqli_query($conn,$sql) or die(mysql_error());
                                    ?>
                                    
                                      <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                                            <th>No<i class="fa fa-sort"></i></th>
                                            <th>NIP<i class="fa fa-sort"></i></th>
                                            <th>Nama Guru<i class="fa fa-sort"></i></th>
                                            <th>Kelas<i class="fa fa-sort"></i></th>
                                            <th>Tahun<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                               <?php
                                      //include('koneksi.php');
                                      $sql = mysqli_query($conn,"SELECT guru.nip, guru.nama_gr, kelas.kls, thnajar.thn, wali_kls.id_wali FROM wali_kls left JOIN guru ON wali_kls.nip = guru.nip LEFT JOIN kelas ON wali_kls.id_kls = kelas.id_kls LEFT JOIN thnajar ON wali_kls.id_thn = thnajar.id_thn"); 
                                     $No  = 0; 
                                     while ($row2 = mysqli_fetch_array($sql)) {
                                        $No++;
                                     $kode = $row2['id_wali'];
                                  ?>
                                            
                                                <tr>
                                                    <td><?php echo $No;?></td>
                                                    <td><?php echo $row2['nip'];?></td>
                                                    <td><?php echo $row2['nama_gr'];?></td>
                                                    <td><?php echo $row2['kls'];?></td>
                                                    <td><?php echo $row2['thn'];?></td>
                                                     <td align="center">
                                                   <a href="editwali.php?hal=editwali&kd=<?php echo $kode;?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapuswali.php?hal=hapus&kd=<?php echo $kode;?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></td></tr>
                                               
                                             <?php
                                             }
                                               ?>
                                            </tbody>
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
    <! --/wrapper -->
     <!-- /MAIN CONTENT -->
<?php
include "layout/footer.php";
?> 

</body>
</html>