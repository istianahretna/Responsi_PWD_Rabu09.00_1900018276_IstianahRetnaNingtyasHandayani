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
    $pdf->Cell(190,7,'DATA KETERSEDIAAN PRODUK',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR PRODUK YANG DI PASARKAN',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    //membuat header table
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'ID PRODUK',1,0);
    $pdf->Cell(50,6,'NAMA PRODUK',1,0);
    $pdf->Cell(25,6,'HARGA',1,0);
    $pdf->Cell(50,6,'BERAT PRODUK',1,0);
    $pdf->Cell(30,6,'STOK',1,1);
    $pdf->SetFont('Arial','',10); 
    include 'koneksi.php'; 
    $mahasiswa = mysqli_query($conn, "select * from data_barang"); //untuk mengambil semua data yang ada di table mahasiswa
    while ($row = mysqli_fetch_array($mahasiswa)){ //melakukan perulangan untuk memberikan isian sesuai dengan header yang telah dibuat di astas
        $pdf->Cell(30,6,$row['id_produk'],1,0);
        $pdf->Cell(50,6,$row['nama_produk'],1,0);
        $pdf->Cell(25,6,$row['harga_produk'],1,0);
        $pdf->Cell(50,6,$row['berat_produk'],1,0);
        $pdf->Cell(30,6,$row['stok'],1,1);
    }
    $pdf->Output(); //digunakan untuk menampilkan data, agar data dapat dilihat oleh user
?>
