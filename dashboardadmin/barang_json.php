<?php
    include "koneksi.php"; //untuk koneksi database dengan mengkonfigurasi dan memanggil file koneksi.php
    //mengambil data tabel data_barang dari database MySQL, serta Menggunakan fungsi php mysqli_query()
    $sql="select * from data_barang order by id_produk";
    $tampil = mysqli_query($conn,$sql);  //jalankan query ke dalam variabel $tampil
    if (mysqli_num_rows($tampil) > 0) { //untuk mengetahui berapa banyak jumlah baris hasil pemanggilan fungsi mysqli_query()

    $no=1; //pemberian nomer, yamg dapat bertambah sejumlah banyaknya data
    //Membuat array
    $response = array(); 
    $response["data"] = array();
    //menghasilkan struktur data dalam bentuk array asosiatif maupun array numerik
    while ($r = mysqli_fetch_array($tampil)) { //perulangan yang digunakan untuk proses pengambilan data MySQL
    $h['id_produk'] = $r['id_produk'];    //menampilkan data id_produk yang di ambil dari database Mysql
    $h['nama_produk'] = $r['nama_produk']; // menampilkan data nama_produk yang di ambil dari database Mysql
    $h['harga_produk'] = $r['harga_produk']; //menampilkan data harga_produk yang di ambil dari database Mysql
    $h['berat_produk'] = $r['berat_produk']; //menampilkan data berat_produk yang di ambil dari database Mysql
    $h['stok'] = $r['stok']; //menampilkan data stok yang di ambil dari database Mysql
    array_push($response["data"], $h);
    }
    //Menampilkan konversi data pada tabel data_barang ke format JSON
    echo json_encode($response); 
    }
    else {
    $response["message"]="tidak ada data";  //menampilkan pesan jika tidak ada data.
    echo json_encode($response); //Menampilkan konversi data pada tabel data_barang ke format JSON
    }
?>
