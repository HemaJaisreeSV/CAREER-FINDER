<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
            p{
            height: 300px;
            width: 1000px;
            font-size: 30px;
            position: absolute;
            top: 45%;
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
                        <li class="active"> <a href="print_cantact_us.php" >Contact Us </a> </li>
                        <li> <a href="home.php">Home </a> </li>
                    </ul>
                </div>
            </div>
            <div class="about-section">
                <h1>Contact Us Page</h1>
            
                <?php
                    $conn = mysqli_connect("localhost","root","","sample");
        
                    $_query = "SELECT * FROM contact_us";
                    $query_run = mysqli_query($conn, $_query);

                   if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                        <p> <b><i class="fa fa-phone" ></i> <br><?php print $row['contact_number'] . "<br><br>"; ?>
                               <i class="fa fa-map-marker" ></i><br> <?php print $row['contact_address'] . "<br><br>"; ?> 
                               <i class="fa fa-envelope" ></i><br> <?php print $row['mail_to'] . "<br><br>"; ?>
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
