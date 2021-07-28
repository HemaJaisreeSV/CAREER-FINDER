<?php
include('security.php');
$conn = mysqli_connect("localhost","root","","sample");

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM contact_us WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Contact Us details are deleted";
        header('Location: contactus.php');
    }
    else 
    {
        $_SESSION['status'] = "Could not delete Contact Us details";
        header('Location: contactus.php');  
    }

}




if(isset($_POST['update_btn']))
{
    $id =  $_POST['edit_id'];
    $contactno = $_POST['edit_contactno'];
    $contactaddress = $_POST['edit_contactaddress'];
    $mailto = $_POST['edit_mailto'];

    $query = "UPDATE contact_us SET contact_number='$contactno',contact_address='$contactaddress',mail_to='$mailto' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Contact Us is updated successfully";
        header('Location: contactus.php');
    }
    else 
    {
        $_SESSION['status'] = "Could not update About Us";
        header('Location: contactus.php');  
    }

}


if(isset($_POST['contact_save']))
{
    $contactno = $_POST['contactno'];
    $contactaddress = $_POST['contactaddress'];
    $mailto = $_POST['mail_to'];


    $query = "INSERT INTO contact_us(contact_number,contact_address,mail_to) VALUES ('$contactno','$contactaddress','$mailto')";
    $query_run = mysqli_query($conn, $query);
   
    if($query_run)
    {
        $_SESSION['success'] = "Contact Us added successfully";
        header('Location: contactus.php');
    }
    else 
    {
        $_SESSION['status'] = "Could not add Contact Us";
        header('Location: contactus.php');  
    }
}

?>
