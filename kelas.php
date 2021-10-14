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
           <?php
  include "layout/navbar.php"; 
  
  include "layout/menu.php";    // tampilan menu
?>
             
        <!-- /. NAV SIDE  -->
      
        </nav>  
        <?php
    include('koneksi.php');
     $id_kls = isset($_POST['id_kls'])? $_POST['id_kls'] : '';
       $nis = isset($_POST['nis'])? $_POST['nis'] : '';
        $id_thn = isset($_POST['id_thn'])? $_POST['id_thn'] : '';
  ?>
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    
                    <div class="col-lg-12">
                    <h2>Daftar Data ISI kelas</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='kelas.php' method="POST">
                     <a href="tmbhkelas.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan kelas atau nis' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='kelas.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a></input>
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
                                    $query1="select * from det_kls";

                                    if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $query1="SELECT * FROM det_kls 
                                   where kls like '%$qcari%'
                                   or nis like '%$qcari%'";
                                    }
                                    $tampil=mysqli_query($conn,$query1) or die(mysql_error());
                                    ?>
                             <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                                        <tr>
                                            <th>No.<i class="fa fa-sort"></i></th>
                                            <th>Kelas<i class="fa fa-sort"></i></th>
                                            <th>NISN<i class="fa fa-sort"></i></th>
                                            <th>Siswa<i class="fa fa-sort"></i></th>
                                            <th>Tahun Ajaran<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                         <?php
                                      //include('koneksi.php');
                                      $sql = mysqli_query($conn,"SELECT det_kls.id_det_kls, kelas.kls, murid.nis, murid.nama, thnajar.thn FROM det_kls left JOIN kelas ON det_kls.id_kls = kelas.id_kls LEFT JOIN murid ON det_kls.nis = murid.nis LEFT JOIN thnajar ON det_kls.id_thn = thnajar.id_thn ORDER BY id_det_kls ASC"); 
                                     $No  = 0; 
                                     while ($row2 = mysqli_fetch_array($sql)) {
                                        $No++;

                                       $Kode = $row2['id_det_kls'];
                                  ?>
                                                <tr>
                                                    <td><?php echo $No;?></td>
                                                    <td><?php echo $row2['kls'];?></td>
                                                    <td><?php echo $row2['nis'];?></td>
                                                    <td><?php echo $row2['nama'];?></td>
                                                    <td><?php echo $row2['thn'];?></td>
                                                    <td align="center">
                                                    <a  href="editkls.php?hal=editkls&kd=<?php echo $Kode;?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapuskls.php?hal=hapus&kd=<?php echo $Kode;?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></td></tr>
                                              <?php
                                             }
                                               ?> 
                                               </table>
                                               </tbody>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
                                   
                             </div>
                        </div>
                   <?php
          }
?>
             <!-- /. PAGE INNER  -->
          <!-- /. WRAPPER  -->
           </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
     <?php
    include "layout/footer.php";
  ?>

</body>
</html>