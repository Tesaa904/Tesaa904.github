<?php 
session_start();
if($_SESSION){
    if($_SESSION['level']=="admin")
    {
        header("Location:../index.php");
    }
    if($_SESSION['level']=="walikelas")
    {
        header("Location:../index.php");
    }
}
 
 include('koneksi.php')
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SD kanisius 1 Murukan</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2><strong>Halaman Login</strong></h2>
            </div>

        </div>
          <div class="row ">
            <div class="content">
                <div class="alert alert-info">
                  <b> Sistem Informasi Nilai Siswa Kurikulum 2013 SD kanisius 1 Murukan Wedi</b>
                    <br>Silakan login dengan username dan password yang telah diberikan oleh Admin Sekolah. Jika belum mendapatkan, silakan hubungi Admin Sekolah.
                    </div>
              
                   </div>
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="jumbotron text-center">
                              <img src="assets/img/logo.png"class="img-circle" >
                            </div>
                          <div class="panel-body">

                              <form action="proses_login.php" class="inner-login" method="post">
                                <form role="form font-weight: 300;">
                                     <div class="form-group input-group">
                                          <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Username" name="username" autofocus="on" required="required" />
                                        </div>
                                      <div class="form-group input-group">
                                          <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Password" name="pass" required="required" />
                                        </div>

                                        <button type="submit" name="login" id="login" value="login" class="btn btn-info btn-fill pull-left"><i class="fa fa-check-circle"></i> Login</button> 
                                </div>
                           
                        </div>
                    </div>
                </form>  
        </div>
      
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript">
    </script>
</body>
</html>