<!DOCTYPE html>
<html lang="en" dir="ltf">
<head>
    <meta charset="utf-8">
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="login.css"> 
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <div class="notif"> 
               <?php if(isset($_GET['error'])){ ?><p class="error"> <?php echo $_GET['error'] ?> </p><?php } ?></div>                  
        <form action="con_login.php" method="POST">
            <div class="txt_field">
                <input type="email" name="email" class="form-control my-3 p-4" />
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
            <input type="password" name="password" class="form-control my-3 p-4" />
                <span></span>
                <label>Password</label>
            </div>
            <div class="capcha">
            <img src='captcha.php' />
                <input name='captcha_code' placeholder="code" class="capca "  type='text'>
                </div>
            <input type="submit" value="Login">
            <div class="signup">Belum Punya Akun ? <a href="signup.php"> Daftar Disini</a></div>
        </form>
    </div>
</body>
</html>
