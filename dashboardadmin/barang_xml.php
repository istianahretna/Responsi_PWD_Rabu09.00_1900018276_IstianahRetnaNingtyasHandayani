<?php
    include "koneksi.php"; //untuk koneksi database dengan mengkonfigurasi dan memanggil file koneksi.php
    header('Content-Type: text/xml'); //header file XML
    $query = "SELECT * FROM data_barang"; //menampilkan data dari database, table data_barang
    $hasil = mysqli_query($conn,$query); //Untuk mengirimkan perintah query.
    $jumField = mysqli_num_fields($hasil); //mengembalikan fungsi jumlah kolom dalam satu set hasil
 
    //menulis tag dengan elemennya
    echo "<?xml version='1.0'?>"; 
    echo "<data>"; //membuat tag pembuka dengan nama tag nya "data"
    //membuat array
    //menghasilkan struktur data dalam bentuk array asosiatif maupun array numerik
    while ($data = mysqli_fetch_array($hasil)) //perulangan yang digunakan untuk proses pengambilan data MySQL
    {
    echo "<databarang>"; //membuat tag pembuka dengan nama tag nya "databarang"
    echo"<id>",$data['id_produk'],"</id>";  //membuat tag id dan menampilkan data Id Produk yang di ambil dari database Mysql
    echo"<namaproduk>",$data['nama_produk'],"</namaproduk>"; //membuat tag nama dan menampilkan data Nama yang di ambil dari database Mysql
    echo"<harga>",$data['harga_produk'],"</harga>"; //membuat tag harga dan menampilkan data harga_produk yang di ambil dari database Mysql
    echo"<berat>",$data['berat_produk'],"</berat>"; //membuat tag berat dan menampilkan data berat_produk yang di ambil dari database Mysql
    echo"<stok>",$data['stok'],"</stok>"; //membuat tag stok dan menampilkan data stok yang di ambil dari database Mysql
    echo "</databarang>"; //membuat penutup tag databarang
    }
    echo "</data>"; //membuat tag penutup data
?>
