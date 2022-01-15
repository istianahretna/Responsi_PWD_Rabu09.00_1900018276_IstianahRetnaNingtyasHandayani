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

    <title>Tambah Data</title>
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
                     <h2>Tambah Data Produk</h2> <br>
                     <a href="form.php" class="btn btn-info btn-sm m-2"> Kembali </a>
                        <br><br>
    <div class="data" style=" width:800px; height:200px; position:absolute;">
      <div class="row">
          <div class="col-sm-6 offset-sm-3">
        <form action="" method="post">
            <div class="form-group">
                <label>Id Produk</label>
                <input type="number" name="id_produk" class="form-control" >
            </div>
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="text" name="harga_produk" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Stok Produk</label>
                <input type="text" name="stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Berat produk</label>
                <input type="text" name="berat_produk" class="form-control" required>
            </div>
            <button type="submit" name="Submit" class="btn btn-success btn-sm mt-2"> Tambah </button>
        </form>
        </div>
        </div>
      </div>
      </div>
      <?php
      
//melakukan mengecek data pada formulir yang dikirimkan, dan akan memasukkan data formulir ke dalam tabel pengguna.
//Pemakaian method POST ini digunakan untuk mengirimkan data yang penting / kredensial dan data yang orang lain tidak boleh tau
if(isset($_POST['Submit'])) { //ketika di submit maka data akan di proses
$id = $_POST['id_produk']; //variabel $id_produk menangkap data POST "id" yang dikirim dengan atribut Nim, dan ditampung di variabel $id_produk
$nama_produk = $_POST['nama_produk']; //variabel $nama_produk menangkap data POST "Nama" yang dikirim dengan atribut Nama, dan ditampung di variabel $nama_produk
$harga = $_POST['harga_produk']; //variabel $harga_produk menangkap data POST "Harga Produk" yang dikirim dengan atribut Jenis_Kelamin, dan ditampung di variabel $harga_produk
$stok = $_POST['stok'];
$berat = $_POST['berat_produk']; //variabel $Berat Produk menangkap data POST "Berat Produk" yang dikirim dengan atribut Berat Produk, dan ditampung di variabel $alamat


// memanggil file koneksi.php untuk menghubungkan dengan database
include_once("koneksi.php");

//Masukkan data pengguna ke dalam tabel data barang
$result = mysqli_query($conn, "INSERT INTO data_barang(id_produk ,nama_produk, harga_produk, stok ,berat_produk) 
        VALUES('$id','$nama_produk','$harga','$stok','$berat')"); //variable variabel yang telah di isi data,  
         header("Location: form.php");
}
      ?>
  
                        
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