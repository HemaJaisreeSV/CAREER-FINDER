<?php
    session_start();
    include 'dbconfig.php';
    $_SESSION['message']='';
    
    if(isset($_POST['login_btn']))
    {
      $email_login = $_POST['email'];
      $password = md5($_POST['password']);

      $query = "SELECT * FROM company WHERE c_mail='$email_login' AND c_password='$password' ";
      $query_run = mysqli_query($conn,$query);

      if(mysqli_fetch_array($query_run))
      {
          $_SESSION['username'] =  $email_login ;
          $_SESSION['logo'] = $logo;
          header('location:index.php');  
      }
      else
      {
          $_SESSION['message']="Incorrect Email Id or Password";
          header('location:companylogin.php');
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
      <div class="title"style="font-size:30px;">Company Login</div>
      <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo '<h2 class="bg-info text-white""> '.$_SESSION['message'].' </h2>';
                unset($_SESSION['message']);

            }
      ?>
      <form action="" method="post">
            <div class="field">
              <input type="email" name="email" required>
              <label>Email Id</label>
            </div>
            <div class="field">
              <input type="password" name="password" required>
              <label>Password</label>
            </div>
            <div class="content">
              <div class="pass-link"><a href="#">Forgot password?</a></div>
            </div>
            <div class="field">
              <input type="submit" name="login_btn" value="Login">
            </div>
            <div class="signup-link">Not registered yet? <a href="companyregister.php">Register now</a>
           
            </div>
            
           
      </form>
    </div>
  </body>
</html>
