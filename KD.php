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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SD kanisius 1 Murukan</title>
     <script src="assets/js/jQuery-2.1.4.min.js"></script> <!-- lib js untuk ajax -->
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/adminLTE.min.css">
  
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
               <?php
  include "layout/navbar.php"; 
  include "layout/menu.php";
?> 
            
        </nav>
        <!-- /. NAV SIDE  -->
        <?php
    include('koneksi.php');
     $id_mapel = isset($_POST['id_mapel'])? $_POST['id_mapel'] : '';
       $id_smstr = isset($_POST['id_smstr'])? $_POST['id_smstr'] : '';
        $id_thn = isset($_POST['id_thn'])? $_POST['id_thn'] : '';
  ?>
        
       <div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">-->
                   <!--<div class="panel-heading">-->
                    <div class="col-lg-12">
                    <h2>Daftar Data KD</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                     <form action='KD.php' method="POST">
                     <a href="tmbhKD.php" class="btn btn-primary tambah-form" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</a>
                    </div>

                       <!--</div>-->
                    <div class="row mt">
                  <div class="col-lg-4">
                 <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan smster dan nama mapel' required /> <input type='submit' value='Cari Data' class="btn btn-sm btn-danger" /> <a href='KD.php' class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-refresh"> Refresh </i></a>
                  </div>
                    </div>
                <br />
                   <!-- </div>-->
                    <!--</div>-->
                    <!-- Advanced Tables -->
                     <div class="card mb-3">
                  <div class="card-header">
                 <i class="fas fa-user"></i>
                 </div>
              <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                         <tbody>
                           <?php
                            $sql="select * from aturan";

                                  if(isset($_POST['qcari'])){
                                   $qcari=$_POST['qcari'];
                                   $sql="SELECT * FROM  aturan 
                                   where smstr like '%$qcari%'
                                   or nm_mapel like '%$qcari%'";
                                    }
                                    $result=mysqli_query($conn,$sql) or die(mysql_error());
                                    ?>
                          
                                        <tr>
                                            <th>No.<i class="fa fa-sort"></i></th>
                                            <th>Mapel<i class="fa fa-sort"></i></th>
                                             <th>semester<i class="fa fa-sort"></i></th>
                                              <th>Tahun Ajaran<i class="fa fa-sort"></i></th>
                                               <th>KD1<i class="fa fa-sort"></i></th>
                                               <th>KD2<i class="fa fa-sort"></i></th>
                                                <th>KD3<i class="fa fa-sort"></i></th>
                                                <th>KD4<i class="fa fa-sort"></i></th>
                                                <th>KI1<i class="fa fa-sort"></i></th>
                                                <th>KI2<i class="fa fa-sort"></i></th>
                                                <th>KI3<i class="fa fa-sort"></i></th>
                                                <th>KI4<i class="fa fa-sort"></i></th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                
                                            <?php
                                       $sql = mysqli_query($conn,"SELECT aturan.*, mapelj.nm_mapel, smstr.smstr, thnajar.thn FROM aturan left JOIN mapelj ON aturan.id_mapel = mapelj.id_mapel LEFT JOIN smstr ON aturan.id_smstr = smstr.id_smstr LEFT JOIN thnajar ON aturan.id_thn = thnajar.id_thn ORDER BY id_aturan ASC"); 
                                          $No = 0;
                                        while ($row2 = mysqli_fetch_array($sql)) {
                                          $No++;
                                           $kode = $row2['id_aturan'];
                                  ?>
              
                                                <tr>
                                                    <td><?php echo $No;?></td>
                                                    <td><?php echo $row2['nm_mapel'];?></td>
                                                    <td><?php echo $row2['smstr'];?></td>
                                                    <td><?php echo $row2['thn'];?></td>
                                                    <td><?php echo $row2['kd1'];?></td>
                                                    <td><?php echo $row2['kd2'];?></td>
                                                    <td><?php echo $row2['kd3'];?></td>
                                                    <td><?php echo $row2['kd4'];?></td>
                                                    <td><?php echo $row2['ki1'];?></td>
                                                    <td><?php echo $row2['ki2'];?></td>
                                                    <td><?php echo $row2['ki3'];?></td>
                                                    <td><?php echo $row2['ki4'];?></td>
                                                    <td align="center">
                                                   <a href="editKD.php?hal=editKD&kd=<?php echo $kode;?>">
                                                      <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
                                                      </a> ||
                                                      <a href="hapusKD.php?hal=hapusKD&kd=<?php echo $kode;?>">
                                                      <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span></a></td></tr>
                                               
                                             <?php
                                              }
                                            }
                                               ?>
                           </tbody>
                           </tr>
                           </thead>
                           </table>
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