<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="sample";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if($conn)
    {
       // echo 'Database Connected';
    }
    else
    {
        echo 'Database Connection failed';
    }
?>