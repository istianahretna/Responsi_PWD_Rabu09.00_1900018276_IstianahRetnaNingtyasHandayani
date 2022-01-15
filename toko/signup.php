<!DOCTYPE html>
<html lang="en" dir="ltf">
<head>
    <meta charset="utf-8">
    <title>Signup </title>
    <link rel="stylesheet" type="text/css" href="login.css"> 
</head>
<style>
     .error{
      color: #9C0000;
      height:40px;
      padding:5px;
      width:350px;
      margin-left:20px;
      background: #E9A1A1;
      text-align:center;
    }
    .success{
      color: #40754c;
      padding:10px;
      width:95%;
      margin:20px auto;
      background: #D4EDDA;
    }
</style>
<body>
    <div class="center">
        <h1>Sign-Up</h1>
        <div class="notif"> 
        <?php if(isset($_GET['error'])){ ?><p class="error"> <?php echo $_GET['error'] ?> </p><?php } ?>     
        <?php if(isset($_GET['success'])){ ?><p class="success"> <?php echo $_GET['success'] ?> </p><?php } ?> 
        <form action="con_signup.php" method="POST">
            
            <div class="txt_field">
      <?php if(isset($_GET['name'])){ ?>
        <input type="text" name="name" placeholder="Nama" value="<?php echo $_GET['name']; ?>" /><br>
        <?php } else{ ?>     
          <input type="text" name="name" placeholder="Nama"/><br>
            <?php }?>
        </div>

        
        <div class="txt_field">
      <?php if(isset($_GET['email'])){ ?>
        <input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>" /><br>
        <?php } else{ ?>     
          <input type="email" name="email" placeholder="Email"/><br>
            <?php }?>
        </div>

        <div class="txt_field">
      <?php if(isset($_GET['password'])){ ?>
        <input type="password" name="password"placeholder="Password" value="<?php echo $_GET['password']; ?>" /><br>
        <?php } else{ ?>     
          <input type="password" name="password" placeholder="Password"/><br>
            <?php }?>
        </div>

        <div class="txt_field">
      <?php if(isset($_GET['re_password'])){ ?>
        <input type="password" name="re_password" placeholder="re_password" value="<?php echo $_GET['re_password']; ?>" /><br>
        <?php } else{ ?>     
          <input type="password" name="re_password" placeholder="re_password"/><br>
            <?php }?>
          </div>


            
            <input type="submit" value="Signup">
            <div class="signup">Sudah Punya Akun ? <a href="login.php"> Login</a></div>
        </form>
    </div>
</body>
</html>
