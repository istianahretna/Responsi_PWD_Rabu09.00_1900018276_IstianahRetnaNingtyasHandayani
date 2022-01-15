<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";


$koneksi = new mysqli("localhost", "root", "" , "responsi_pwd");

// ketika keranjang kosong akan di arahkan ke halaman produk.php
// if(empty($_SESSION['keranjang'] or !isset($_SESSION['keranjang']))){
//     echo "<script>alert('keranjang masih kosong');</script>";
//     echo "<script>location='produk.php';</script>";
// }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Keranjang</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="#">Wedang Herbalku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="produk.php">Produk</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="hubungi.php">Hubungi Kami</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="keranjang.php">Keranjang</a>
        </li>
      </ul>
      <form>
          <a href="index.php" class="btn btn-success" type="botton" value="Logout" name="logout"> Logout </a>
        </form>
    </div>
  </div>
</div>
</nav>

<section class="konten">
    <div class="container">
        <br>
        <h1>Keranjang belanja</h1>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Jumlah </th>
                    <th>Total Harga</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <!-- id_produk adalah id dari produk yang di masukan di keranjang -->
                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                    <?php 
                    $ambil=$koneksi->query("SELECT * FROM data_barang WHERE id_produk='$id_produk'");
                    $pecah = $ambil-> fetch_assoc();
                    $subharga = $pecah['harga_produk']*$jumlah;

                    ?>
                <tr>
                    <td> <?php echo $nomor;?> </td>
                    <td><?php echo $pecah['nama_produk'];?> </td>
                    <td><?php echo $pecah['berat_produk'];?> </td>
                    <td>Rp <?php echo number_format($pecah['harga_produk'])?></td>
                    <td><?php echo $jumlah ?></td>
                    <td>Rp <?php echo number_format($subharga); ?></td>
                    <td><a class="btn btn-danger" href="hapuskeranjang.php?id=<?php echo $id_produk?>">Hapus</a></td>
                </tr>
                <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
                </table>
                <a href="produk.php" class="btn btn-primary"> Tambah Barang </a>
                <a href="checkout.php" class="btn btn-warning"> Checkout </a>
    </div>
</section>




</body>
</html>