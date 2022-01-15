<?php
include_once("koneksi.php");


 session_start();
if(isset($_SESSION['email'])){
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- FONTAWESOME STYLES-->
     <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
     <link rel="stylesheet" type="text/css" href="admin.css"> 

    <title>Pesanan User</title>
  </head>
    
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Selamat Datang Admin</b></a>
   
      <form class="d-flex">
      <a href="logout.php" class="btn btn-success square-btn-adjust">Logout</a>
      </form>
    </div>
  </div>
</nav> 
<div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-14 pr-3 pt-4 p-4">
    <ul class="nav flex-column ml-3 mb-5" style=" height: 1000px;">
    <li class="nav-item">
    <a class="nav-link text-white" href="dashboard.php">Dashboard</a><hr class="bg-secondary">
  </li>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" style="margin-right:15px" href="form.php">Kelola Produk</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="komentar.php">Komentar</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="pesanan.php">Pesanan</a><hr class="bg-secondary">
  </li>
</ul>
    </div>
    <div class="col-md-10 p-5 pt-3">
    <div class="row">
                    <div class="col-md-12">
                     <h2>Pesanan Customer</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
<!-- ==================================== Menampilkan data pesanan ================================ -->
<table width='80%' border="3" class="table table-bordered">
            <tr>
                <th>ID PEMBELIAN</th> 
                <th>ID PELANGGAN</th> 
                <th>NO HP</th> 
                <th>TGL PEMBELIAN</th> 
                <th>ALAMAT PENGIRIMAN</th>
                <th>SUB TOTAL</th>
                
            </tr>
            <?php
            //result untuk mengkoneksikan database dan tinggal di panggil di bagian ini
            //yang mana fungsi mysqli_fetch_array akan menangkap data dari hasil perintah query sql dan membentuknya ke dalam array asosiatif 
            //atau array numerik
            $sql="select * from pembelian"; 
            $tampil = mysqli_query($conn,$sql);
            while($user_data = mysqli_fetch_array($tampil)) { 
                        echo "<tr>";
                        echo "<td>".$user_data['id_pembelian']."</td>"; 
                        echo "<td>".$user_data['id_pelanggan']."</td>";
                        echo "<td>".$user_data['nohp']."</td>"; 
                        echo "<td>".$user_data['tgl_pembelian']."</td>"; 
                        echo "<td>".$user_data['alamat_pengiriman']."</td>"; 
                        echo "<td>".$user_data['sub_total']."</td>"; 
                        }
                 ?>
                    </table>    



<!-- ======================================== /// ================================================== -->

                <!-- /. ROW  -->
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
      <?php
  }else{
      header("Location: loginadmin.php");
      exit();
  }
  ?>
</html>