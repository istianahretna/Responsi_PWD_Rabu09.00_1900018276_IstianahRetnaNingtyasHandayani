<!-- dengan URL Hosting -->
<?php
    //url yang di tulis merupakan situs alamat dari data mahasiswa yang telah di hosting
    $url = "https://tyas1234.000webhostapp.com/barang.php";
    //variable $client menampung fungsi variable $url, dan untuk menginisialisasi library terhadap link url web service yang telah di buat
    $client = curl_init($url);
    // digunakan untuk mengatur opsi opsi fungsi $url tersebut
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    //untuk menampung fungsi curl_exec terhadap variable $client, variable curl_excel digunakan untuk mengeksekusi query url nya
    $response = curl_exec($client);
    //data yang telah di masukan kedalam fungsi fungsi, kemudian di encode ke dalam json. sehingga keluarannya dalam bentuk json
    $result = json_decode($response); 

    //menampilkan data, agar terlihat di browser
    foreach ($result as $r) { //melakukan perulangan yang datanya dalam bentuk array
    echo "<p>";
    echo "id_produk : " . $r->id_produk . "<br />"; //menampilkan data nim
    echo "nama produk : " . $r->nama_produk . "<br />";  //menampilkan data nama
    echo "harga produk : " . $r->harga_produk . "<br />";  //menampilkan data harga_produkamin
    echo "berat produk : " . $r->berat_produk . "<br />"; //menampilkan data alamat
    echo "stok : " . $r->stok . "<br />"; //menampilkan data tanggal lahir
    echo "</p>";
}

