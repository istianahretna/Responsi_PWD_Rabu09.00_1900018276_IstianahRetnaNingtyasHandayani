<?php
session_start();
 include "koneksi.php";
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'email='. $email. '&name='. $name; 
  

    if (empty($name)){
        header("Location: signup.php?error=Username harus di isi&$user_data");
    exit();
     }
     else if(empty($email)){
        header("Location: signup.php?error=Email harus di isi&$user_data");
    exit();
    }
    else if(empty($password)){
        header("Location: signup.php?error=Password harus di isi&$user_data");
    exit();
    }
    else if(empty($re_password)){
        header("Location: signup.php?error=Re_password harus di isi&$user_data");
    exit();
    }
    else if($password !== $re_password){
        header("Location: signup.php?error=Konfirmasi password harus sama&$user_data");
    exit();
    }
   else if (empty($email) || empty($password)) {
    header("Location: signup.php?error=Username atau Password kosong!&$user_data");
    exit();
       
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=Harus format email!&$user_data");
        exit();
    }
    else if (strlen($password) < 6) {
        header("Location: signup.php?error=Password harus terdiri dari 6 karakter!&$user_data");
        exit();
    }
    else if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
        header("Location: signup.php?error=Password harus terdiri 1 angka dan huruf kapital!&$user_data");
        exit();
    }


    else{

        // hashing the password
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    
         if (mysqli_num_rows($result) > 0){
            header("Location: signup.php?error=Nama pengguna sudah dipakai coba yang lain&$user_data");
            exit();
    }else{
        $sql2 = "INSERT INTO users(name, email, pass ) VALUES('$name', '$email', '$password')";
        $result2 = mysqli_query($conn, $sql2);
        if($result2){
            header("Location: signup.php?success=Akun anda telah berhasil dibuat");
            exit();
        }else{
            header("Location: signup.php?error=Terjadi kesalahan yang tidak diketahui&$user_data");
            exit();
        }
    }
      }
}else{
     header("Location: signup.php");
    exit();
}

?>