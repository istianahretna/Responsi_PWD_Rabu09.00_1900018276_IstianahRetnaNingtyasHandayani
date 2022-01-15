<?php
$koneksi = new mysqli("localhost", "root", "" , "responsi_pwd");
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){
?>
<?php
    // memanggil library FPDF 
    require('fpdf184/fpdf.php'); //menuliskan nama file librari fpdf dalam sebuah folder fpdf184
    // intance object dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('l','mm','A5'); //melakukan seting pada halaman PDF 
    //digunakan untuk membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16); //melakukan seting pada tulisan data, seperti meseting font, ukuran dan lainnya 
    // mencetak string
    $pdf->Cell(190,7,'Laporan Transaksi Belanja',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'Terimakasih telah belanja di toko kami',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    //membuat header table
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,7,'ID Pembeli       :',0,0);
    $pdf->Cell(190,7,$_SESSION['id'],0,1);
    $pdf->Cell(40,7,'Nama Pembeli :',0,0);
    $pdf->Cell(190,7,$_SESSION['name'],0,1);
    $pdf->Cell(40,7,'Email Pembeli :',0,0);
    $pdf->Cell(190,7,$_SESSION['email'],0,1);
    
    $nomor=1;

    $pdf->Cell(10,7,'',0,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'No',1,0,'C');
    $pdf->Cell(60,6,'Nama Produk',1,0,'C');
    $pdf->Cell(40,6,'Berat Produk',1,0,'C');
    $pdf->Cell(30,6,'Jumlah',1,0,'C');
    $pdf->Cell(40,6,'Harga',1,1,'C');
    $pdf->SetFont('Arial','',10,'C'); 
    include 'koneksi.php'; 
    $totalbelanja = 0;
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah){
    $mahasiswa = mysqli_query($conn, "select * from data_barang WHERE id_produk='$id_produk'"); //untuk mengambil semua data yang ada di table mahasiswa
    while ($row = mysqli_fetch_array($mahasiswa)){ //melakukan perulangan untuk memberikan isian sesuai dengan header yang telah dibuat di astas
        $pdf->Cell(20,6,$nomor,1,0,'C');
        $pdf->Cell(60,6,$row['nama_produk'],1,0);
        $pdf->Cell(40,6,$row['berat_produk'],1,0,'C');
        $pdf->Cell(30,6,$jumlah,1,0,'C');
        $pdf->Cell(40,6,$row['harga_produk'],1,1,'C');
        $nomor++;

        $ambil=$koneksi->query("SELECT * FROM data_barang WHERE id_produk='$id_produk'");
        $pecah = $ambil-> fetch_assoc();
        $subharga = $pecah['harga_produk']*$jumlah;
        $totalbelanja+=$subharga;
    } 
    
}
$pdf->Cell(3,2,'',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,7,'Total Belanja : ',0,0);
$pdf->Cell(190,7,$totalbelanja,0,1);

$pdf->Cell(3,2,'',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,7,'Lakukan Pembayaran Ke No Rek BNI 025 845 8288  ',0,0);
    $pdf->Output(); //digunakan untuk menampilkan data, agar data dapat dilihat oleh user
?>
<?php
}else{
      header("Location: login.php");
      exit();
  }
  ?>
