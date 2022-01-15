<?php 

$koneksi = new mysqli("localhost", "root", "" , "responsi_pwd");
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){
?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah){ 
                    
                    $ambil=$koneksi->query("SELECT * FROM data_barang WHERE id_produk='$id_produk'");
                    $pecah = $ambil-> fetch_assoc();
                    $subharga = $pecah['harga_produk']*$jumlah;
                    $totalbelanja+=$subharga;
                    
                 } ?>

<?php
                if(isset($_POST['submit'])){
                   
                    $id_pelanggan= $_SESSION["id"];
                    $nohp = $_POST['nohp'];
                    $tglpembelian= date("Y-m-d");
                    $alamat = $_POST['alamat_pengiriman'];
                  
                    include_once("koneksi.php");
                    // $qryid = mysqli_query($conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                    // $data = mysqli_fetch_array($qryid);
                    // $tarifbelanja=$data['tarif']+$totalbelanja ;

                    $result = mysqli_query($conn, "INSERT INTO pembelian (id_pelanggan, nohp, tgl_pembelian, alamat_pengiriman, sub_total) 
                    VALUES('$id_pelanggan','$nohp','$tglpembelian','$alamat','$totalbelanja')"); 
                    if($result){
                        header("Location: konfirmasi.php");
                        exit();
                  }
                }   
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
  <style>
    .konfirmasi{
      color: #40754c;
      padding:10px;
      width:95%;
      margin:20px auto;
      background: #D4EDDA;
    }
    .konfirmasi h2{
      text-align:center;

    }
    </style>
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
          <a href="logout.php" class="btn btn-success" type="botton" value="Logout" name="logout"> Logout </a>
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

        <div class="konfirmasi">
        <h2>Terimakasih Telah Belanja Di Toko Kami</h2>
        </div>

                <div class="tombol" style="">
                <a href="Produk.php" class="btn btn-primary"> Produk</a>
                <a href="lap_transaksi.php" class="btn btn-success"> Cetak Transaksi </a>
                </div>
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