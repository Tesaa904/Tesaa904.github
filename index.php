 <?php 
 session_start();
 if(!isset($_SESSION['username'])){
  header("location:login.php");
 }

 if($_SESSION['level']==""){
    header("location:login.php");
  }else{
 
include('koneksi.php'); 
//session login di php
}
  // cek apakah yang mengakses halaman ini sudah login
 
  ?>
<!DOCTYPE html>
<html xmlns>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SD kanisius 1 Murukan</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <div class="row">
                 <div class="col-md-12">
					 <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
                 <div class="jumbotron text-center">
                      <h1>SD KANISIUS 1 MURUKAN</h1>
                     <p> Gandungan | Wedi | Klaten | Jawa Tengah</p>
                    <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                      <a href="" class="img-thumbnail">
                        <img class="img-responsive" src="assets/img/profil.png">
                          </a>
                          </div>
                         </div>
                        </div>
                     </div>
                </div>
                </div>
               
             <!-- /. PAGE INNER  -->
             </div>
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
        <footer class="site-footer">
            <div class="copy text-center">
            &copy; copyright <?php echo date('Y');?> | by SD KANISIUS 1 MURUKAN</a>
              </div>
          </div>
      </footer>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
  
</body>
</html>