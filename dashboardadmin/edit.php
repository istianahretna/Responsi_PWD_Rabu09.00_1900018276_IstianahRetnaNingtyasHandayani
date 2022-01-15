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

    <title>Edit Data</title>
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
        <?php
//untuk koneksi database dengan mengkonfigurasi file koneksi.php
//file koneksi sudah ada pada file edit.php, karena sudah di panggil
include_once("koneksi.php");

if(isset($_POST['update'])){ //ketika di update maka data akan di proses
    $id = $_POST['id_produk']; //variabel $id menangkap data POST "id_produk" yang dikirim dengan atribut id, dan ditampung di variabel $id
    $nama=$_POST['nama_produk']; //variabel $nama menangkap data POST "nama_produk" yang dikirim dengan atribut Nama, dan ditampung di variabel $nama
    $harga=$_POST['harga_produk']; //variabel $harga menangkap data POST "harga produk" yang dikirim dengan atribut Jenis_Kelamin, dan ditampung di variabel $harga
    $stok=$_POST['stok']; //variabel $stok menangkap data POST "stok" yang dikirim dengan atribut stok, dan ditampung di variabel $stok
    $berat=$_POST['berat_produk']; //variabel $berat menangkap data POST "berat_produk" yang dikirim dengan atribut berat, dan ditampung di variabel $berat
   
   
    $result = mysqli_query($conn, "UPDATE data_barang SET nama_produk='$nama', harga_produk='$harga',berat_produk='$berat', stok='$stok' WHERE id_produk='$id'");
    //langsung menuju ke halaman form.php untuk menampilkan data pengguna yang diperbarui dalam daftar
    header("Location: form.php");
    }
?>

<?php
// Tampilkan data pengguna yang dipilih berdasarkan id_produk yang di dapat dan sesuai
$id = $_GET['id_produk'];

//Mengambil data pengguna berdasarkan id_produk
$result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='$id'");
//memberikan alternatif cara menampilkan data MySQL yang telah di edit.
//yang mana fungsi mysqli_fetch_array akan menangkap data dari hasil perintah query sql dan membentuknya ke dalam array asosiatif dan atau array numerik
    while($user_data = mysqli_fetch_array($result)){
        $id = $user_data['id_produk'];
        $nama = $user_data['nama_produk'];
        $harga = $user_data['harga_produk'];
        $stok = $user_data['stok'];
        $berat = $user_data['berat_produk'];
    }
    // harus di tutup karena di bawahnya ada html
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Edit Data Produk</title>
  </head>

  <body>
      <div class="container">
      <h1>Update Data Barang</h1>
      <a href="form.php" class="btn btn-info btn-sm m-2"> Data </a>

      <div class="row">
          <div class="col-sm-6 offset-sm-3">
        <form  method="post" action="edit.php">
            <!-- sebagai primary key, dan mengantisipasi valie nim berubah -->
           
            <div class="form-group">
                <label>Id Produk</label>
                <input type="number" name="id_produk" value="<?= $id?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="<?= $nama?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="text" name="harga_produk" value="<?= $harga?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Stok Produk</label>
                <input type="text" name="stok" value="<?= $stok?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Berat Produk</label>
                <input type="text" name="berat_produk" value="<?= $berat?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-success btn-sm mt-2"> update </button>
        </form>
        </div>
        </div>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
    
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