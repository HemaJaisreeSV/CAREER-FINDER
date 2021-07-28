<?php
    session_start();
    include 'dbconfig.php';
    $_SESSION['message']='';
    
    if(isset($_POST['login_btn']))
    {
      $email_login = $_POST['uname'];
      $password = md5($_POST['pwd']);

      $query = "SELECT * FROM student WHERE s_mail='$email_login' AND s_password='$password' ";
      $query_run = mysqli_query($conn,$query);
      
      if(mysqli_fetch_array($query_run))
      {
          $_SESSION['uname'] =  $email_login ;
          $_SESSION['logo'] = $logo;
          header('location:index.php');  
      }
      else
      {
          $_SESSION['message']="Incorrect Email Id or Password";
          header('location:studentlogin.php');
      }
    }
    
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title" style="font-size:30px;">Student Login</div>
      <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo '<h2 class="bg-info text-white""> '.$_SESSION['message'].' </h2>';
                unset($_SESSION['message']);

            }
      ?>
      <form action="" method="post">
        <div class="field">
          <input type="email" name="uname" required>
          <label>Email Id</label>
        </div>
        <div class="field">
          <input type="password" name="pwd" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        <div class="field">
          <input type="submit" name="login_btn" value="Login">
        </div>
        <div class="signup-link">Not registered yet? <a href="studentregister.php">Register now</a>
        </div>
      </form>
    </div>
  </body>
</html>
