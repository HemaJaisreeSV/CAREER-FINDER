<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addabout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addaboutus.php" method="POST">
      <input type="hidden" name="id" value="1">
        <div class="modal-body">

            <div class="form-group">
                <label> Title </label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sub title </label>
                <input type="text" name="subtitle" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"  class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Links</label>
                <input type="text" name="links" class="form-control" required >
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="about_save" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">About Us
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addabout">Add</button>
    </h6>
  </div>

<div class="card-body">
  <?php
  if(isset($_SESSION['success']) && $_SESSION['success'] !='')
  {
    echo '<h2 class="bg-success text-white"> '.$_SESSION['success'].' </h2>';
    unset($_SESSION['success']);

  }
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
      echo '<h2 class="bg-info text-white""> '.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);

  }
  ?>

  <div class="table-responsive">
      <?php
        $conn = mysqli_connect("localhost","root","","sample");

        $query = "SELECT * FROM about_us";
        $query_run = mysqli_query($conn, $query);
      ?>
  <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    <tr>
      <th> Title </th>
      <th> Sub title </th>
      <th> Description </th>
      <th> Links </th>
      <th> Action </th>
    </tr>
    <tboby>
    <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>

    
      <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['sub_title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['links']; ?></td>
        <td> 
          <form action="about_edit.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT </button>
          </form>
        </td>
    
      </tr>
      <?php
          }
        }
        else
        {
          echo"No records found";
        }
      ?>
    </tboby>
    </table>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>






