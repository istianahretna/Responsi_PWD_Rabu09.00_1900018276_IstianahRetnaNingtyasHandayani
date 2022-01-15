<?php
$url = "https://tyas-project.000webhostapp.com/getDataProduk.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);
foreach ($result as $r) {
 echo "<p>";
 echo "id_produk : " . $r->id_produk . "<br />";
 echo "nama_produk : " . $r->nama_produk . "<br />";
 echo "harga_produk : " . $r->harga_produk. "<br />";
 echo "berat_produk: " . $r->berat_produk . "<br />";
 echo "stok : " . $r->stok . "<br />";
 echo "</p>";
}