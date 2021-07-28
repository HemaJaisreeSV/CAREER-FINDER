<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit About Us Page</h6>
  </div>

<div class="card-body">
<?php
$conn = mysqli_connect("localhost","root","","sample");
    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
       
        $query = "SELECT * FROM about_us WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach($query_run as $row)
        {
            ?>
            <form action="addaboutus.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label> Title </label>
                    <input type="text" name="edit_title" value="<?php echo $row['title']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="edit_subtitle" value="<?php echo $row['sub_title']; ?>" class="form-control" required>
                    
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input <textarea name="edit_description" value="<?php echo $row['description']; ?>" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Links</label>
                    <input type="text" name="edit_links" value="<?php echo $row['links']; ?>" class="form-control" required >
                </div>         
                <button type="submit" name="update_btn" class="btn btn-primary"> Update </button>
                <a href="aboutus.php" class="btn btn-danger"> Cancel </a>
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

