<?php
//memulai fungsi session
session_start();

//md5() = membuat random captcha 
$random_alpha = md5(rand()); 

// menghasilkan jumlah karakter yang akan ditampilkan 
$captcha_code = substr($random_alpha, 0, 6); 

//menampung data captcha code pada fungsi SESSION
$_SESSION["captcha_code"] = $captcha_code; 

//menghasilkan gambar dan menentukan suatu ukuran dengan menggunakan GD Library
$target_layer = imagecreatetruecolor(70,35);

//mengalokasikan sebuah warna dan menyimpannya ke dalam sebuah variabel "$captcha_background"
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119); 

//digunakan untuk mengisi gambar dengan warna yang diberikan
imagefill($target_layer,0,0,$captcha_background); 

//menetapkan warna ke gambar
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0); 

//menggambar sebuah string dengan posisi horisontal
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color); 

//menampilkan gambar dan menunjukan bahwa content gambar yang diciptakan berekstensi jpeg
header("Content-type: image/jpeg"); 

//imagejpeg = untuk menyimpan file gambar jpeg dan mengatur kualitas file gambar yang disimpan dari resource yang telah di buat 
imagejpeg($target_layer); 
?>