<?php
    session_start();
    include 'db.php';
    $_SESSION['message']='';
    
    if(isset($_POST['login']))
    {
      $mail = $_POST['uname'];
      $password = md5($_POST['pwd']);

      $sql = "SELECT * FROM student WHERE s_mail= '$mail' && s_password= '$password'";
      $result = mysqli_query($conn,$sql);
      
      if(mysqli_num_rows($result))
      {
          $_SESSION['uname'] =  $mail ;
          $_SESSION['name']= $sql1;
      
          //echo '<script>alert("Registered Successfully!")</script>';
          header("location:log.php");  
      }
      else
      {
          $_SESSION['message']="Incorrect Password";
          echo '<script>alert("Incorrect Password")</script>';
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
      <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
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
          <input type="submit" name=login value="Login">
        </div>
        <div class="signup-link">Not registered yet? <a href="studentregister.php">Register now</a>
        </div>
      </form>
    </div>
  </body>
</html>
