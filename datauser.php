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
                <div class="row">
                    <div class="col-lg-12">
                    <h2>Daftar Data User</h2>   
                        
                    <div class="box box-primary">
                     <div class="box-header with-border">
                      <form action='datauser.php' method="POST">
                     <a href="register.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                          </div>
                       </div>
                        <div class="row mt">
              <div class="col-xs-4">
           <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan nama' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='datauser.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh</i></a>
            </div>
              </div>
              <br />
                    </div>
                    </div>
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
                            $query1="select * from user";

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $query1="SELECT * FROM  user 
                                   where nama_u like '%$qcari%'";
                                    }
                                    $tampil=mysqli_query($conn,$query1) or die(mysql_error());
                                    ?>
                                    
                                     <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                      
                                            <th>Nama <i class="fa fa-sort"></i></th>
                                            <th>Username<i class="fa fa-sort"></i></th>
                                             <th>Password<i class="fa fa-sort"></i></th>
                                            <th>level<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                
                                           <?php while($row1=mysqli_fetch_array($tampil))
                                            { ?>
              
                                                <tr>
                                                   
                                                    <td><?php echo $row1['nama_u'];?></td>
                                                    <td><?php echo $row1['username'];?></td>
                                                    <td><?php echo $row1['pass'];?></td>
                                                    <td><?php echo $row1['level'];?></td>
                                                    
                                                    <td><center><a  href="edituser.php?nama_u=<?php echo $row1['nama_u'];?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapususer.php?nama_u=<?php echo $row1['nama_u'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></center></td></tr>
                                               
                                                  <?php
                                                  }
                                                  ?>
                                                  </table>
                                                  </tbody>

                                                </div>
                                              </div>
                                         </form>
                                      </div>
                                    </div>
                                  </div>
                              </div>
      
        <?php
      }
      ?>
           </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
        <footer class="site-footer">
            <div class="copy text-center">
            &copy; copyright 2018 | by SDkanisius1murukan</a>
              </div>
          </div>
      </footer>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
      <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/sweetalert.min.js"></script> <!-- lib js untuk sweet alert -->
 

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

</body>
</html>