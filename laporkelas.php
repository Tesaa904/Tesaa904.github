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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
      
     <div id="page-wrapper" >
            <div id="page-inner">
                    <div class="col-lg-12">
                    <h2>Daftar Data Perkelas</h2>   
                    <div class="box box-primary">
                     <div class="box-header with-border">
                     </div>
                      </div>
                 
                     <form class="" action="laporkelas.php"  method="POST">
                     <label>Kelas</label>
                    <select name="kelas" id="kls"  class="form-control"/>
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
                    <label class="col-sm-2 col-sm-2 control-label">Pilih Tahun</label>
                     <select name="tahun" class="form-control">
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
                        
                      <br/>
                        </div>
                        <div class="text-right">
                        <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" name="qcari" class="col-sm-2" /> <a href='laporkelas.php' class="btn btn-sm btn-success" class="col-sm-2"><i class="glyphicon glyphicon-refresh"></i> Refresh</i></a>
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
                        <th>No </th>
                        <th>NIP </th>
                        <th>Nama Wali Kelas </th>
                        <th>NISN</th>
                      </tr>  
                      </thead>
                      <tbody>
                      <?php
                           if (isset($_POST['qcari'])){
                           $post_kelas = $_POST['kelas'];
                           $post_tahun = $_POST['tahun'];

                                       $sql_nilai = mysqli_query($conn,"SELECT a.nip, b.nama_gr, c.nis FROM wali_kls a
                                        INNER JOIN guru b ON a.nip=b.nip
                                        INNER JOIN kelas e ON a.id_kls=e.id_kls
                                        INNER JOIN det_kls c ON a.id_kls=c.id_kls
                                        INNER JOIN thnajar g ON a.id_thn=g.id_thn
                                        WHERE a.id_kls='$post_kelas' AND a.id_thn='$post_tahun'");
                                       $no=0;
                                      while ($nilai = mysqli_fetch_array($sql_nilai)){
                                        $no++;
                                        ?>
           
                    <tr>
                    <td> <?php echo $no; ?> </td>
                    <td><?php echo $nilai['nip'];?></td>
                    <td><?php echo $nilai['nama_gr'];?></td>
                    <td><?php echo $nilai['nis']; ?></td>
                  </tr>
                     <?
                     }
                   }
                     ?>
               </tbody>
               </table> 
                <div class="text-right">
                  <a href="laporan/cetak_kelaspdf.php?tahun=<?php echo $post_tahun;?>&kelas=<?php echo $post_kelas;?>" target="_new" class="btn btn-sm btn-info">Cetak <i class="fa fa-print"></i></a>
              
                </div>
               </div>
              </div> 
              </div>
            </div><!-- col-lg-12-->      	
          	</div><!-- /row -->              
           <?php
         }
         ?>
      <!--footer end-->
  </section>
        </div>
     <?php
    include "layout/footer.php";
  ?>

  </table>
</html>


