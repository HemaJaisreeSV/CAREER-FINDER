<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Contact Us Page</h6>
  </div>

<div class="card-body">
<?php
$conn = mysqli_connect("localhost","root","","sample");
    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
       
        $query = "SELECT * FROM contact_us WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach($query_run as $row)
        {
            ?>
            <form action="addcontactus.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label> Contact Number </label>
                    <input type="text" name="edit_contactno" value="<?php echo $row['contact_number']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label> Contact Address</label>
                    <input <textarea name="edit_contactaddress" value="<?php echo $row['contact_address']; ?>" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Mail To</label>
                    <input type="email" name="edit_mailto" value="<?php echo $row['mail_to']; ?>" class="form-control" required >
                </div>
                <button type="submit" name="update_btn" class="btn btn-primary"> Update </button>
                <a href="contactus.php" class="btn btn-danger"> Cancel </a>
            </form>
    <?php
            }

        }
    ?>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>

