<?php
include_once("koneksi.php");


 session_start();
if(isset($_SESSION['email'])){
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Dashboard Admin</title>
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
                <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="dashboard.php">Admin</a> 
                    </div>
        <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
                </nav>   
                <!-- /. NAV TOP  -->
                        <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                            </li>
                            <li>
                                <a class="active-menu"  href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                            </li>
                            <li  >
                            <a  href="form.php"><i class="fa fa-table fa-3x"></i> Table Barang </a>
                            </li>
                            <li  >
                            <a  href="komentar.php"><i class="fa fa-edit fa-3x"></i> Komentar </a>
                            </li>	
                            <li>
                             <a href="pesanan.php"><i class="fa fa-desktop fa-3x"></i> Pesanan </a>
                            </li>						

                        </ul>
                    
                    </div>
                    
                </nav>  
                
                <!-- /. NAV SIDE  -->
               <div id="page-wrapper" >
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-6">
                            <h2>Admin Dashboard</h2>   
                                <h5> Selamat Datang Kembali Admin </h5>
                            </div>
                        </div>   
                    <!-- /. PAGE INNER  -->
                         <!-- /. ROW  -->
                  <hr />

                <div class="row">

          <div class="col-md-3 col-sm-6 col-xs-6">           
		        <div class="panel panel-back noti-box">
               
                <div class="text-box" >
              <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang jahe bubuk' ");
              while($user_data = mysqli_fetch_array($result)) {  
                   echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                   echo $user_data['nama_produk']; 
                } 
                  ?>
                  </div>
                </div>
		        </div>
                    
         <div class="col-md-3 col-sm-6 col-xs-6">           
          <div class="panel panel-back noti-box">
                    <div class="text-box" >
                    <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang temulawak bubuk' ");
                  while($user_data = mysqli_fetch_array($result)) {  
                      echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                      echo $user_data['nama_produk']; 
                    } 
                      ?>
                    </div>
                </div>
            </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">           
          <div class="panel panel-back noti-box">
                    <div class="text-box" >
                    <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang kunir bubuk' ");
                  while($user_data = mysqli_fetch_array($result)) {  
                      echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                      echo $user_data['nama_produk']; 
                    } 
                      ?>
                    </div>
                </div>
            </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">           
          <div class="panel panel-back noti-box">
                <div class="text-box" >
                <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang jahe kayu manis' ");
              while($user_data = mysqli_fetch_array($result)) {  
                   echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                   echo $user_data['nama_produk']; 
                } 
                  ?>
                </div>
             </div>
		     </div>
			 </div>
                 <!-- /. ROW  -->
                    <br>
                  <!-- /. ROW  -->
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			  <div class="panel panel-back noti-box">
                <div class="text-box" >
                <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'Wedang Jahe Serai' ");
              while($user_data = mysqli_fetch_array($result)) {  
                   echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                   echo $user_data['nama_produk']; 
                } 
                  ?>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			  <div class="panel panel-back noti-box">
                <div class="text-box" >
                <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'Wedang Kunyit Asem Bubuk' ");
              while($user_data = mysqli_fetch_array($result)) {  
                   echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                   echo $user_data['nama_produk']; 
                } 
                  ?>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
		   	<div class="panel panel-back noti-box">
                <div class="text-box" >
                <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang jahe merah bubuk' ");
              while($user_data = mysqli_fetch_array($result)) {  
                   echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                   echo $user_data['nama_produk']; 
                } 
                  ?>
                </div>
             </div>
		     </div>
              <div class="col-md-3 col-sm-6 col-xs-6">           
			          <div class="panel panel-back noti-box">
                  <div class="text-box" >
                  <?php  $result = mysqli_query($conn, "SELECT * FROM data_barang Where nama_produk = 'wedang skoteng bubuk' ");
                  while($user_data = mysqli_fetch_array($result)) {  
                    echo "Sisa ".$user_data['stok']." Stok  <br><br>"; 
                    echo $user_data['nama_produk']; 
                  } 
                  ?>
                </div>
             </div>
		     </div>
			</div>
            
                 <!-- /. ROW  -->

                    </div>
                <!-- /. PAGE WRAPPER  -->
                </div>

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
    <?php
  }else{
      header("Location: loginadmin.php");
      exit();
  }
  ?>
</div>
</html>

