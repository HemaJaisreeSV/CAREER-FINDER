<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
            p{
            height: 300px;
            width: 1000px;
            font-size: 30px;
            position: absolute;
            top: 40%;
            left: 20%;
            margin-top: -100px;
            margin-left: -100px;
            color:white; 
            text-align: center; 
            font-family : comic-sans-serif;

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
                        <li class="active"> <a href="print_about_us.php" >About Us </a> </li>
                        <li> <a href="home.php">Home </a> </li>
                    </ul>
                </div>
            </div>
            <div class="about-section">
                <h1>About Us Page</h1>
            
                <?php
                    $conn = mysqli_connect("localhost","root","","sample");
        
                    $_query = "SELECT * FROM about_us";
                    $query_run = mysqli_query($conn, $_query);

                   if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>

                        <p> <b> <?php print "Title : " .$row['title'] . "<br><br>";?> 
                            <?php echo "Sub Title : " .$row['sub_title'] . "<br><br>";  
                                      echo "Description : " .$row['description'] . "<br><br>"; 
                                      echo "Link : " .$row['links'] . "<br>"; ?>
                                      </b> 
                            </p>
                                      
                        <?php 
                        }
                    } 
                    else
                    {
                        echo"No records found";
                    }
                ?>
                </div>
        </div>
        
    </body>
    
</html>
