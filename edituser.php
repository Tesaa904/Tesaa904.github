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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
         <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
               <a class="navbar-brand" href="index.php">kanismur</a> 
            </div>
  <div style="color: blue;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
        </nav>   
           <!-- /. NAV TOP  -->
            <?php
  
  include "layout/menu.php";    // tampilan menu
?>
        </nav>  
 
    <!-- row -->
    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ubah Data User </h2> 
                    </div>
                    </div>
                    <?php 
                    $nama_u = $_GET['nama_u'];          
                    $query = mysqli_query($conn,"SELECT * FROM user WHERE nama_u='$nama_u'");
                    while($row1 = mysqli_fetch_array($query)){
                    ?>
                   <form class="" action="update-user.php" method="post" name="form1" id="form1">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                          </div>
                           <form role="form">
                           <div class="form-group">
                            <label class="col-sm-2 control-label">Nama User</label>
                              <input name="nama_u" type="text" id="nama_u" class="form-control" value="<?php echo $row1['nama_u'];?>"  readonly />
                           </div>
                           <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>                     
                             <input name="username" type="text" id="username" class="form-control" value="<?php echo $row1['username'];?>"autofocus="on" />
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">password</label>                     
                               <input name="pass" type="text" id="pass" class="form-control" value="<?php echo $row1['pass'];?>"/>
                          </div>
                           <div class="form-group">
                           <label>Level</label>
                            <select id="level" name="level" class="form-control">
                              <option value="admin">admin</option>
                              <option value="walikelas">walikelas</option>
                            </select>
                          </div>
                          <input type="submit" value="Ubah" name="submit" class="btn btn-primary" />&nbsp;
                         <a href="datauser.php" class="btn btn-sm btn-danger">Batal </a>
                         <?php
                       }
                       ?>
                         </form>
                        </div>
                      </div>
                     </div>  
                    </form>
                   </div>
                  
                  <?php
                }
                ?>
              </nav>
            </div>
            </div>


 <?php
    include "layout/footer.php";
  ?>
  
</body>
</html>