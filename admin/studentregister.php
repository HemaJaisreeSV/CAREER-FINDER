<?php
  session_start();
  include 'dbconfig.php';
  $_SESSION['message']='';

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if($_POST['pwd']==$_POST['cpwd'])
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];    
        $phone = $_POST['phno'];
        $mail = $_POST['mail'];
        $pwd = md5($_POST['pwd']);
        $profilepicture = 'studentprofilepics/'.$_FILES['profile_pic']['name'];

        $mail=mysqli_real_escape_string($conn,$mail);
        $profilepicture=mysqli_real_escape_string($conn,$profilepicture);

        
        $currentDate = date("d-m-Y");
        $age = date_diff(date_create($dob), date_create($currentDate));
        
        if(preg_match("!image!", $_FILES['profile_pic']['type']))
        {
          if(!empty($_POST['gender'])) 
          {
            
            if($age->format("%y") >= 20)
            {
                if(copy($_FILES['profile_pic']['tmp_name'],$profilepicture))
                {
                  
                  $_SESSION['$mail']=$mail;
                  $_SESSION['profile_pic']=$profilepicture;
    
                  $sql="INSERT INTO student(full_name,s_address,gender,dob,ph_no,s_mail,s_password,profile_pic)
                  VALUES('$name','$address','$gender','$dob','$phone','$mail','$pwd','$profilepicture')";
                  
                  if(mysqli_query($conn,$sql))
                  {
                    
                    $_SESSION['message']="Registered Successfully!";
                    header("location:studentlogin.php");
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
              $_SESSION['message']="Please enter valid Date of Birth!";
              echo '<script>alert("Please enter valid Date of Birth!")</script>';
            }
          }
          else
          {
            $_SESSION['message']="Please select the Gender!";
            echo '<script>alert("Please select the Gender!")</script>';
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
    <title>Student Registration</title>
    <link rel="stylesheet" href="style1.css">
     <meta name="viewport" content="width=100%, initial-scale=1.0">
   </head>
<body>

  <div class="container">
  <div class="title">Register as Student</div>
    <div class="content">
      <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" required>
          </div>
          
          <div class="gender-details">
        <input type="radio" name="gender" value="Male" id="dot-1"required>
        <input type="radio" name="gender" value="Female" id="dot-2"required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
            
          </label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
            
          </label>
          </div>
        </div> 
          <div class="input-box">
            <span for="inputdate">Date of Birth</span>
            <input type="date" name="dob"  required>
          </div>
        <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="phno" required>
          </div>
          <div class="input-box">
            <span class="details">Email Id</span>
            <input type="email"  name="mail" required>
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
            <span class="details">Upload Profile Picture</span>
            <input type="file" name="profile_pic" required>
          </div>
          
        </div>
        
        <div class="button">
          <input type="submit" value="Register">
        </div>
        
      </form>
    </div>
  </div>
</div>
</body>
</html>
