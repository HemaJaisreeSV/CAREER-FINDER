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
      <form action="svalidation.php" method="post">
        <div class="field">
          <input type="email" name="username" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" name="pwd" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        <div class="field">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
  </body>
</html>
