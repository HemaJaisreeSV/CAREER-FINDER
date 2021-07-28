<?php
include('security.php');
$conn = mysqli_connect("localhost","root","","sample");

if(isset($_POST['update_btn']))
{
    $id =  $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

    $query = "UPDATE about_us SET title='$title',sub_title='$subtitle',description='$description',links='$links' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "About Us is updated successfully";
        header('Location: aboutus.php');
    }
    else 
    {
        $_SESSION['status'] = "Could not update About Us";
        header('Location: aboutus.php');  
    }

}


if(isset($_POST['about_save']))
{
    $id = $_POST['id']; 
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];


    $sql="SELECT id from about_us where id='$id'";
    $res=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    if($row>0)
    {
        $_SESSION['status'] = "About Us already exists";
        header('Location: aboutus.php');
    }

    else
    {
        $query = "INSERT INTO about_us(title,sub_title,description,links) VALUES ('$title','$subtitle','$description','$links')";
        $query_run = mysqli_query($conn, $query);
  
            if($query_run)
            {
                $_SESSION['success'] = "About Us added successfully";
                header('Location: aboutus.php');
            }
            else 
            {
                $_SESSION['status'] = "Could not add About Us";
                header('Location: aboutus.php');  
            }

    }
   
        
}

?>
