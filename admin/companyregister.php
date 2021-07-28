<?php
  session_start();
  include 'dbconfig.php';
  $_SESSION['message']='';

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if($_POST['pwd']==$_POST['cpwd'])
    {
        $name = $_POST['cname'];
        $address = $_POST['address'];
        $pname = $_POST['pname'];
        $ph_no = $_POST['cno'];    
        $mail = $_POST['mail'];
        $url = $_POST['url'];
        $pwd = md5($_POST['pwd']);
        $logo = 'companylogo/'.$_FILES['uploadlogo']['name'];

        $mail=mysqli_real_escape_string($conn,$mail);
        $logo=mysqli_real_escape_string($conn,$logo);

        if(preg_match("!image!", $_FILES['uploadlogo']['type']))
        {
            if(copy($_FILES['uploadlogo']['tmp_name'],$logo))
            {
              $_SESSION['$mail']=$mail;
              $_SESSION['uploadlogo']=$logo;

              $sql="INSERT INTO company(company_name,c_address,cperson_name,c_ph_no,c_mail,website_url,c_password,logo)VALUES
              ('$name','$address','$pname','$ph_no','$mail','$url','$pwd','$logo')";

              if(mysqli_query($conn,$sql))
              {
                $_SESSION['message']="Registered Successfully!";
                echo '<script>alert("Registered Successfully!")</script>';
                header("location:companylogin.php");
              }
              else
              {
                $_SESSION['message']="User could not register";
                echo '<script>alert("User could not register")</script>';
              }
            }
            else
            { 
                $_SESSION['message']="File Upload Failed!";
                echo '<script>alert("File Upload Failed!")</script>';
            }
        }
        else
        {
          $_SESSION['message']="Please upload only JPG, PNG or GIF image!";
          echo '<script>alert("Please upload only JPG, PNG or GIF image!")</script>';
        }
    }
    else
    {
      $_SESSION['message']="Password does not match!";
      echo '<script>alert("Password does not match!")</script>'; 
     
    }
  }
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Company Registration</title>
    <link rel="stylesheet" href="style1.css">
     <meta name="viewport" content="width=100%, initial-scale=1.0">
     
   </head>
<body>

  <div class="container">
  <div class="title">Register as Company</div>
    <div class="content">
      <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Company Name</span>
            <input type="text"  name="cname" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" required>
          </div>
          <div class="input-box">
            <span class="details">Contact Person Name</span>
            <input type="text"  name="pname" required>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="cno" required>
          </div>
          <div class="input-box">
            <span class="details">Email Id</span>
            <input type="email"  name="mail" required>
          </div>
          <div class="input-box">
            <span class="details">Company's Website</span>
            <input type="url"  name="url" required>
          </div>        
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pwd" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpwd" required>
          </div>
          <div class="input-box">
            <span class="details">Upload Logo</span>
            <center><input type="file" name="uploadlogo" required></center>
          </div>
        </div>  
        
        <div class="button">
          <input type="submit" value="Register">
        </div>
        </div>
      </form>
    </div>
  </div>




</body>
</html>






