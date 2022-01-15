<?php
//Menghubungkan data dengan mengkonfigurasi file koneksi database
include_once("koneksi.php");

//Memperoleh id_produk dari URL untuk menghapus data pengguna yang dipilih
$id_produk = $_GET['id_produk'];

//Menghapus baris pengguna dari tabel berdasarkan id_produk yang diperoleh
$result = mysqli_query($conn, "DELETE FROM data_barang WHERE id_produk='$id_produk'");

//Akan menampilkan data terbaru di home/index.php setelah menghapus data yang dipilih berdasarkan id_produk yang diseleksi
header("Location:form.php");
?>
