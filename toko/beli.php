<?php
session_start();
$id_produk = $_GET['id'];

if (isset($_SESSION['keranjang'][$id_produk])){
    // jika sudah ada produk maka di tambah 1
    $_SESSION['keranjang'][$id_produk]+=1;
}else{
    // jika kosong maka menjadi 1
    $_SESSION['keranjang'][$id_produk]=1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('produk telah dimasukan ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";

?>