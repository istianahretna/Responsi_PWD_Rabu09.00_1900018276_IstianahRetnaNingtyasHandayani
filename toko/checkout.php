<?php 
$koneksi = new mysqli("localhost", "root", "" , "responsi_pwd");
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){
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
      </ul>
      <form>
          <a href="logout.php" class="btn btn-info" type="botton" value="Logout" name="logout"> Logout </a>
        </form>
    </div>
  </div>
</div>
</nav>



<section class="konten">
    <div class="container">
        <br>
        <h1>Checkout</h1>
        
        <a href="keranjang.php" class="btn btn-primary"> Edit Keranjang Belanja </a><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Jumlah </th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
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
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <th colspan='5'> Total Belanja Keseluruhan </th>
                <th> Rp. <?php echo number_format($totalbelanja) ?> </th>
            </tfoot>
                </table>
                
                      
<div class="container mt-4">
  <!-- menu form inputan  -->
  <div class="card text-center">
    <div class="card-header">
      <h5><strong>ISI DATA DIRI PELANGGAN</strong></h5>
    </div>
    <div class="card-body">


    <div class="row">
          <div class="col-sm-12 offset-sm-1">
            <form method="post" action="konfirmasi.php">
            <table class=" tabel" width=80% >
            <tr>
              <!-- namanya sesuai akun -->
            <div class="form-group">
            <td><label>Nama</label></td>
            <td> <input type="text" readonly value="<?php echo $_SESSION['name']; ?> " class="form-control"></td>
            </div>
            <tr>

            <tr>
            <div class="form-group">
            <td>  <label> Email </label></td>
            <td> <input type="email" readonly value="<?php echo $_SESSION['email']; ?> " class="form-control"></td>
            </div>
            <tr>

            <tr>
            <div class="form-group">
            <td> <label>No HP</label></td>
            <td> <input type="text" id="nohp" name="nohp" class="form-control"></td>
            </div>
            <tr>

            <tr>
            <div class="form-group">
            <td> <label>Alamat Pengiriman </label></td>
            <td> <input type="text" id="alamat_pengiriman" name="alamat_pengiriman" class="form-control"></td>
            </div>
            <tr>

            </table>
            
            <button type="submit" name="submit" class="btn btn-success btn-sm mt-4"> Checkout </button>
            
            <br><br>
                </form>
               
    </div>
</section>

</body>
</html>
<?php
}else{
      header("Location: login.php");
      exit();
  }
  ?>