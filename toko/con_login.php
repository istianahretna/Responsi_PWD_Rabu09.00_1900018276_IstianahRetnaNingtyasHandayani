<?php
session_start();
include "koneksi.php";
if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    if (empty($email)){
        header("Location: login.php?error=Email harus di isi");
    exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password harus di isi");
    exit();
    }else{
        $password = md5($password); 
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
        if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);

            if($row['email']===$email && $row['pass']===$password){
                $_SESSION['email']= $row['email'];
                $_SESSION['name']= $row['name'];
                $_SESSION['id']= $row['id'];
                header("Location: produk.php");
            }
            else{
                header("Location: login.php?error=Email dan password belum benar");
                exit();      
            }
        }else{
            header("Location: login.php?error=Email dan password belum benar");
            exit();
        } mysqli_close($con); 
        
        }else {
            // jika inputan code captcha salah maka akan ada peringatan dengan tulisan seperti ini :
            header("Location: login.php?error=Captcha harus di isi dan harus sesuai");
            exit();  
            }
    }
}else{
    header("Location: produk.php");
    exit();
}

?>