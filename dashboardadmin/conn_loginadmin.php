<?php
session_start();
include "koneksi.php";

if(empty($_POST['email']) || empty($_POST['password'])){
   echo '<script> alert("Email dan password harus di isi"); 
   document.location.href="loginadmin.php"</script>';
    }else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sqlcek=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' AND pass='$password'");
        if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
        if(mysqli_num_rows($sqlcek)>0){
            $_SESSION['email']=$email;
            header('location:dashboard.php');
        }else{
            echo '<script> alert("Email  dan password belum benar");  
                    document.location.href="loginadmin.php"</script>';
        }mysqli_close($con); 
    }else {

        // jika inputan code captcha salah maka akan ada peringatan dengan tulisan seperti ini :
        echo '<script> alert("Login gagal! Captcha tidak sesuai");  
                    document.location.href="loginadmin.php"</script>';
        exit();  
        }
    }
    
?>