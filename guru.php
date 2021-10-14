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
   include "layout/navbar.php";
  include "layout/menu.php";    // tampilan menu
?>
        </nav>  
        <!-- /. NAV SIDE  -->
        
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-12">
                    <h2>Daftar Data Guru</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='guru.php' method="POST">
                     <a href="tmbhguru.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan nip' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='guru.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
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
                            $query1="select * from guru";

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $query1="SELECT * FROM  guru 
                                   where nip like '%$qcari%'
                                   or nama_gr like '%$qcari%'";
                                    }
                                    $tampil=mysqli_query($conn,$query1) or die(mysql_error());
                                    ?>
                                    
                                     <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                                            <th>Nip<i class="fa fa-sort"></i></th>
                                            <th>Nama Guru<i class="fa fa-sort"></i></th>
                                            <th>Tanggal Lahir<i class="fa fa-sort"></i></th>
                                            <th>Alamat<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                
                                           <?php while($row1=mysqli_fetch_array($tampil))
                                            { ?>
              
                                                <tr>
                                                    <td><?php echo $row1['nip'];?></td>
                                                    <td><?php echo $row1['nama_gr'];?></td>
                                                    <td><?php echo $row1['tgl_lahir'];?></td>
                                                    <td><?php echo $row1['alamat'];?></td>
                                                    
                                                    <td><center><a  href="editguru.php?nip=<?php echo $row1['nip'];?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapusguru.php?nip=<?php echo $row1['nip'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></center></td></tr>
                                               
                                             <?php
                                               }
                                              }
                                               ?>
                                               </table>
                                            </tbody>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
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