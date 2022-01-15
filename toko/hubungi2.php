<?php
include_once("koneksi.php");
$result = mysqli_query($conn, "SELECT * FROM komentar ");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pesan dan Komentar</title>
  </head>
  
  <style>
.tengah{
  margin-left: 80px;
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
.container .row .form-group{
  width:300px;
  padding:2px;
}

.container .row .tabel{
  margin:10px;
  margin-left:-200px;
}
.container .row .tabel tr td{
  margin:10px;
}
  </style>

  <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
  <div class="container">
          <a class="navbar-brand font-weight-bold" href="index.php">Wedang Herbalku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="index.php">Produk</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="hubungi2.php">Hubungi Kami</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="login.php">Login Akun</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </nav>

      
<div class="container mt-5">
  <!-- menu form inputan  -->
  <div class="card text-center">
    <div class="card-header">
      <h5><strong>HUBUNGI KAMI</strong></h5>
    </div>
    <div class="card-body">


    <div class="row">
          <div class="col-sm-6 offset-sm-3">
        <form action="" method="post">
          
          <table class=" tabel" width=180%>
            <tr>
            <div class="form-group">
            <td><label>Nama</label></td>
            <td> <input type="text" id="nama" name="nama" class="form-control"></td>
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
            <td>  <label> Email </label></td>
            <td> <input type="email" id="email" name="email" class="form-control"></td>
            </div>
            <tr>

            <tr>
            <div class="form-group">
            <td> <label>Komentar</label></td>
            <td><textarea class="form-control" placeholder="Leave a comment here" name="komentar" id="floatingTextarea2" style="height: 100px"></textarea></td>
            </div>
            <tr>

            <tr>
              <td colspan="2">  <button type="submit" name="Submit" class="btn btn-success btn-sm mt-2"> Kirim </button></td>
            </tr>
          </table>
       
            
        </form>
        </div>
        </div>

    </div>
    <div class="card-footer text-muted p-4">
    </div>

  </div>
  <!-- penutup form -->
</div>
     
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    if(isset($_POST['Submit'])) { //ketika di submit maka data akan di proses
    $nama = $_POST['nama']; //variabel $nama menangkap data POST "Nama" yang dikirim dengan atribut Nama, dan ditampung di variabel $nama
    $nohp = $_POST['nohp']; 
    $email = $_POST['email']; 
    $komentar = $_POST['komentar'];

    include_once("koneksi.php");


    $result = mysqli_query($conn, "INSERT INTO komentar(nama, nohp, email, komentar) 
            VALUES('$nama','$nohp','$email','$komentar')"); //variable variabel yang telah di isi data,  

echo '<script> alert("Terimakasih Telah Menghubungi Kami");  document.location.href="hubungi2.php"</script>';
    
    }
?>
