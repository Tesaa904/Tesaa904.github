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
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-14">
                    <h2>Daftar Data Siswa</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='murid1.php' method="POST">
                     <a href="tmbhmurid.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan nisn' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='murid1.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </div>
                  </div>
                <br />
                   <!-- </div>-->
                    <!--</div>-->
                    <!-- Advanced Tables -->
                    <div class="row mt">
              <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                         <tbody>
                           <?php
                            $query1=("SELECT * from murid");

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $query1=('"SELECT * FROM  murid 
                                   where nis like '%$qcari%'
                                   or nama like '%$qcari%'"');
                                    }
                                    $tampil=mysqli_query($conn,$query1) or die(mysql_error());
                                    ?>
                                    
                                      <table class="table table-responsive table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                                            <th>NISN<i class="fa fa-sort"></i></th>
                                            <th>Nama Siswa<i class="fa fa-sort"></i></th>
                                            <th>Tempat Lahir<i class="fa fa-sort"></i></th>
                                            <th>Tanggal Lahir<i class="fa fa-sort"></i></th>
                                            <th>Jenis Kelamin<i class="fa fa-sort"></i></th>
                                            <th>Agama<i class="fa fa-sort"></i></th>
                                            <th>Alamat<i class="fa fa-sort"></i></th>
                                            <th>Tahun angkatan<i class="fa fa-sort"></i></th>
                                            <th>Nama orangtua<i class="fa fa-sort"></i></th>
                                            <th>Actions</th>
                                        </tr>
                                
                                           <?php while($row1=mysqli_fetch_array($tampil))
                                            { ?>
              
                                                <tr>
                                                    <td><?php echo $row1['nis'];?></td>
                                                    <td><?php echo $row1['nama'];?></td>
                                                    <td><?php echo $row1['tmp_lahir'];?></td>
                                                    <td><?php echo $row1['tgl_lahir'];?></td>
                                                    <td><?php echo $row1['jenis_kl'];?></td>
                                                    <td><?php echo $row1['agama'];?></td>
                                                    <td><?php echo $row1['alamat'];?></td>
                                                    <td><?php echo $row1['thn_angkt'];?></td>
                                                    <td><?php echo $row1['nama_ortu'];?></td>

                                                    <td><center><a  href="editsiswa.php?nis=<?php echo $row1['nis'];?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></a></span>
                                                      ||
                                                     <a href="hapusmurid.php?nis=<?php echo $row1['nis'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></center></td></tr>
                                               
                                               
                                             <?php
                                               }
                                               ?>
                                            </tbody>
                                             </table>
                                        </from>
                                     </div>
                                  </div>
                        </div>
                        </div>
                        </div>
                      </div>
          </div>
        <?
      }
      ?>

    <! --/wrapper -->
     <!-- /MAIN CONTENT -->
       <?php
    include "layout/footer.php";
  ?>
</body>
</html>