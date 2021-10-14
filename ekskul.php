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
                <div class="row">
                    <div class="col-lg-12">
                    <h2>Daftar Data Ekstrakulikuler</h2>   
                        
                    <div class="box box-primary">
                     <div class="box-header with-border">
                      <form action='ekskul.php' method="POST">
                     <a href="tmbhekskul.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                          </div>
                       </div>
                       <div class="row mt">
              <div class="col-lg-4">
           <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan id dan nama ekskul' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='ekskul.php' class="btn btn-sm btn-success glyphicon glyphicon-refresh"> Refresh</i></a>
            </div>
              </div>
              <br />
                    </div>
                    </div>
                    <!-- Advanced Tables -->
                   <div class="panel panel-success">
                         <div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-user"></i> </h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                           <tbody>
                                 <?php
                                    $query1="select * from eksktra";
                                    if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $query1="SELECT * FROM eksktra 
                                   where id_ektra like '%$qcari%'
                                   or nm_ektra like '%$qcari%'";
                                    }
                                    $tampil=mysqli_query($conn,$query1) or die(mysql_error());
                                    ?>
                             <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                                        <tr>
                                            <th>No<i class="fa fa-sort"></i></th>
                                             <th>ID ekstra<i class="fa fa-sort"></i></th>
                                            <th>Ekstrakulikuler<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>

                                            <?php 
                                            $nomor  = 0;
                                             while ($row1=mysqli_fetch_array($tampil))
                                            {  $nomor++;
                                              ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?> </td>
                                                    <td><?php echo $row1['id_ektra'];?></td>
                                                    <td><?php echo $row1['nm_ektra'];?></td>
                                                    <td align="center">
                                                    <a  href="editekskul.php?nm_ektra=<?php echo $row1['nm_ektra'];?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapusekskul.php?nm_ektra=<?php echo $row1['nm_ektra'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></td>
                                                  </tr>
                                              <?php   
                                              } 
                                               ?>
                                          
                                         </table>
                                         </tbody>
                                         </div>
                             </div>
                        </div>
                  </form>
                    </div>
                    </div>
                    </div>
                    
            
            <?php
          }
          ?>
        
             <!-- /. PAGE INNER  -->
          <!-- /. WRAPPER  -->
          <!-- /MAIN CONTENT -->
      <?php
    include "layout/footer.php";
  ?>

</body>
</html>