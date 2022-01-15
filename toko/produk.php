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

    <title>Dashboard</title>
  </head>

  <style>
.tengah{
  margin-left: 100px;
}
.card{
  margin:15px;
}
.card p{
  margin-top : -10px;
  margin-bottom : 1px;
}
.row .card:hover{
  box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
  transform :scale(1.02);
}
  </style>

  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="#"><b>Wedang Herbalku</b></a>
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


<!--  -------------------  Tampilan Bnner ----------------------------- -->

<div class="col-md-10 m-10" style="margin-left: 120px">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/gambar.jpg" style="height: 550px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Wedang Herbal Bubuk</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/gambar2.jpg" style="height: 550px" class="d-block w-100 " alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tejamin Kualitas Dan Rasa</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/gambar3.jpg" style="height: 550px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Harga Terjangkau</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<!-- ----------------------------- Display Produk ---------------------------- -->

<<div class="col-md">
    <div id="carouselExampleControls" class="carouseln slide" data-ride="carousel">
        <h4 class="text-center font-weight-bold p-5">Produk Terbaru</h4>
      <div class="tengah">
      <div class="row mx-auto mr-3" >

      <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb2.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Temulawak</h5>
              <p class="card-text">Minuman herbal temulawak bubuk yang siap diseduh</p><br><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk1">Detail</button>
              <!-- untuk mendapatkan id produk, agar produk bisa di masukan ke keranjang (file beli.php)-->
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=2");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 15.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb1.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kunir</h5>
              <p class="card-text">Minuman herbal Kunir bubuk yang siap diseduh</p><br><br><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk2">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=3 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 12.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb3.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Jahe Kayumanis</h5>
              <p class="card-text">Minuman herbal  bubuk perpaduan jahe dan kayumanis yang siap diseduh</p><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk3">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=4 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 15.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb4.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Jahe Serai </h5>
              <p class="card-text">Minuman herbal bubuk perpaduan jahe dan serai yang siap diseduh</p><br><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk4">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=5 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 12.000</a>
              <?php } ?>
          </div>
       </div>

     </div>

     <div class="row mx-auto mt-4" >

     <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb5.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kunyit Asem</h5>
              <p class="card-text">Minuman herbal kunyit asem bubuk yang siap diseduh</p><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk5">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=6 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 13.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb6.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Jahe Bubuk</h5>
              <p class="card-text">Minuman herbal jahe bubuk yang siap diseduh</p><br><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk6">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=1 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 13.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/jahemerah.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Jahe Merah</h5>
              <p class="card-text">Minuman herbal jahe merah bubuk yang siap diseduh</p><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk7">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=7 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 15.000</a>
              <?php } ?>
          </div>
       </div>

       <div class="card mr-2 ml-2 p-2" style="width: 15rem;">
            <img src="images/gb8.jpeg" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Skoteng</h5>
              <p class="card-text">Minuman herbal skoteng bubuk yang siap diseduh</p><br><br>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produk8">Detail</button>
              <?php $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk=8 ");
              while($user_data= mysqli_fetch_array($result)){ ?>
              <a href="beli.php?id=<?php echo $user_data['id_produk']?>" class="btn btn-warning">Rp 14.000</a>
              <?php } ?>
          </div>
       </div>

     </div>


     <!-- ---------------------------------Detail Produk -------------------------------------- -->

          <!-- produk 1-->
<div class="modal fade" id="produk1" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='2' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk2" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='3' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk3" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='4' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk4" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='5' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk5" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='6' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk6" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='1' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk7" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%">
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='7' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          <!-- produk 1-->
          <div class="modal fade" id="produk8" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/gambar3.jpeg" width="90%" >
          </div>
          <div class="col-md-6">
          <table class="table table-borderless">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_produk='8' ");
                while($user_data= mysqli_fetch_array($result)){ ?>
              <tr>
                <th>Nama Produk</th>
                <td><?=$user_data['nama_produk']; ?> </td>
              </tr>
              <tr>
                <th>Berat Produk</th>
                <td><?=$user_data['berat_produk']; ?> </td>
              </tr>
              <tr>
                <th>Harga Produk</th>
                <td><?=$user_data['harga_produk']; ?> </td>
              </tr>
              <tr>
                <th>Stok Produk</th>
                <td><?=$user_data['stok']; ?> </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--===========================END====================== -->

     </div>
     </div>
  <div>

    <!-- Optional JavaScript; choose one of the two! -->

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
      header("Location: login.php");
      exit();
  }
  ?>
</html>