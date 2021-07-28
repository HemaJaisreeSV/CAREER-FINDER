<?php
    session_start();
    include 'dbconfig.php';
    $_SESSION['message']='';
    
    if(isset($_POST['login_btn']))
    {
      $email_login = $_POST['email'];
      $password = $_POST['password'];

      $query = "SELECT * FROM admin WHERE a_username='$email_login' AND a_password='$password' ";
      $query_run = mysqli_query($conn,$query);

      if($row=mysqli_fetch_array($query_run))
      {
        $logo=$row['logo'];
          $_SESSION['username'] =  $email_login ;
          //$_SESSION['logo'] = $logo;//
          header('Location: index.php');  
      }
      else
      {
          $_SESSION['message']="Incorrect Email Id or Password";
          header('Location: adminlogin.php');
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
      <div class="title" style="font-size:30px;">Admin Login</div>
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
      </form>
    </div>
  </body>
</html>
