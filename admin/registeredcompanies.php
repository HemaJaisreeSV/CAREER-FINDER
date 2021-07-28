<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Total Registered Companies Details
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

        $query = "SELECT * FROM company";
        $query_run = mysqli_query($conn, $query);
      ?>
  <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    <tr>
      <th> Sl No. </th>
      <th> Company Name </th>
      <th> Address </th>
      <th> Contact Person Name </th>
      <th> Contact Number </th>
      <th> Email Id </th>
      <th> Website </th>
      <th> Logo </th>
    </tr>
    <tboby>
    <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            $i=0;
          while($row = mysqli_fetch_array($query_run))
          {
              
            ?>

    
      <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $row['company_name']; ?></td>
        <td><?php echo $row['c_address']; ?></td>
        <td><?php echo $row['cperson_name']; ?></td>
        <td><?php echo $row['c_ph_no']; ?></td>
        <td><?php echo $row['c_mail']; ?></td>
        <td><?php echo $row['website_url']; ?></td>
        
        <td><img src="<?php echo $row['logo']; ?>" width="100" height="100"></td>
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
