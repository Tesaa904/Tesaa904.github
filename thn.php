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
                
                    <div class="col-lg-12">
                    <h2>Daftar Data Tahun Ajaran</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     </div>
                 
                                <form class="" action="functionthn.php"  method="POST">
                                 <div class="form-group">
                                    <label>Tahun</label>
                                    <input name="thn" type="text" id="thn" class="form-control" required="required" autofocus="on" />
                                  </div>

                                        <div class="modal-footer">
                                           <input type="submit" value="simpan" name="simpan" class="btn btn-sm btn-info" />
                                           <a href="thn.php" class="btn btn-sm btn-danger">Batal </a></input>
                                        </div>
                                 </form>   

                           <div class="col-lg-12">
                      <div class="box box-primary">                      
                    <div class="box-header with-border">
                    </div>
                    </div>
                          </div>
                          <div class="col-lg-12">     
                         <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan thn'/> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='thn.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </div>
                    </div>
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
                                    $sql="select * from thnajar";
                                    if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $sql="SELECT * FROM thnajar 
                                   where thn like '%$qcari%'";
                                   }
                              $tampil=mysqli_query($conn,$sql) or die(mysql_error());
                            
                                    ?>
                                    
                                     <table class="table table-striped table-bordered table-hover table-striped tablesorter">
                          
                                        <tr>
                                            <th>No<i class="fa fa-sort"></i></th>
                                            <th>Tahun<i class="fa fa-sort"></i> </th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                             <?php
                                      //include('koneksi.php');
                                        $No = 0;
                                        while ($row1 = mysqli_fetch_array($tampil)) {
                                          $No++;
                                  ?>
              
                                                <tr>
                                                    <td><?php echo $No;?></td>
                                                    <td><?php echo $row1['thn'];?></td>
                                                   
                                                    <td><center>
                                                      <a href="hapusthn.php?thn=<?php echo $row1['thn'];?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></center></td></tr>
                                               
                                             <?php
                                               }
                                              }
                                               ?>
                                               </table>
                                            </tbody>
                                                               
                                          </div>     
                                        </div>
                                            <!-- /. ROW  -->
                                      </div>
                                            <!-- /. PAGE INNER  -->
                                  </div>      <!-- /. PAGE WRAPPER  -->
                              </div>
                            </div>         
                         </div>
                       </div>
     <!-- /. WRAPPER  -->
      </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
        <?php
    include "layout/footer.php";
  ?>
   
</body>
</html>
