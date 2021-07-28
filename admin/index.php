<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  
  </div>

  <div class="row">


    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size:20px">Total companies registered</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  $query = "SELECT c_mail FROM company ORDER BY c_mail";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h1>'.$row.'</h1>'
              ?>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size:20px">Total students registered</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  $query = "SELECT s_mail FROM student ORDER BY s_mail";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h1>'.$row.'</h1>'
              ?>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>

    
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size:20px">Total Vacancies Posted</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                  $query = "SELECT id FROM vacancy ORDER BY id";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h1>'.$row.'</h1>'
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>