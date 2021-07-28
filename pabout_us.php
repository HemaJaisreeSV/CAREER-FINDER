<?php
echo "sadaout";
                    if(isset($_POST['about_us']))
                    {
                        echo "sadain";
                        $conn = mysqli_connect("localhost","root","","sample");
                        $query = "SELECT * FROM about_us WHERE id=1";
                        $query_run = mysqli_query($conn, $query);
                        if($query_run)
                        {
                        ?>





            <html lang="en" dir="ltr">
            <head>
                <meta charset="utf-8">
                <title>HOME</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style2.css">
                <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Sofia">
                <style>
                
                        p{
                        height: 200px;
                        width: 400px;
                        font-size: 30px;
                        position: fixed;
                        top: 65%;
                        left: 50%;
                        margin-top: -100px;
                        margin-left: -200px;
                    }
                    </style>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/font-awesome.min.css"> 
            </head>
                <body>
                    <div class="full-page">
                        <div class="navbar">
                            <div class="logo"> 
                                <img src="logo1.png" alt="" width="150px" height="100" > 
                            </div>
                            <div class="menu">
                                <ul>
                                    <li class="active"> <a href="home.php">Home </a> </li>
                                        <li> <a href="#">Register</a>
                                            <div class="sub-menu">
                                                <ul class="register-sub">
                                                    <li> <a href="studentregister.php">As Student</a></li>
                                                    <li> <a href="companyregister.php">As Company</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <li> <a href="#">Login</a>
                                        <div class="sub-menu">
                                            <ul class="login-sub">
                                                <li> <a href="adminlogin.php">As Admin</a></li>
                                                <li> <a href="studentlogin.php">As Student</a></li>
                                                <li> <a href="companylogin.php">As Company</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li> <a href="" name="about_us" >About Us </a> </li> 
                                
                                    <li> <a href="contact_us.php">Contact Us </a>  </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div>
                        
                                <?php
                                    echo "Title";
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            $row = mysqli_fetch_array($query_run);
                                        
                                            ?>
                                        <p>  <?php echo $row['title']; ?>  </p>
                                <?php
                                }
                            }
                                        
                                    }
            echo "sada"; ?>
                    </div>

                    
                </body>
                
            </html>
 ?>









