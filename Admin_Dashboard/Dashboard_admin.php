<?php
    include "connection.php";
    include "registration_system/signinsession.php";

    if(!isset($_SESSION['userid'])){
      header('location:login_register.php');
      exit;
  }

  // Fetch all unassigned emergency requests
$query = "SELECT * FROM emergency_requests WHERE assigned_driver_id IS NULL";
$result = mysqli_query($con, $query);

// Fetch all available drivers
$drivers_query = "SELECT * FROM drivers";
$drivers_result = mysqli_query($con, $drivers_query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body style="background-color: #f0f7fc;">

    <!-- <h1 class="text-center bg-success-subtle p-4">Online Covid Test And Vaccination Booking Systen</h1> -->
  <div style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"  class="container-fluid">
    <div class="row">
        <div style="min-height: 100vh;background:#b71c1c;" class="shadow col-lg-3 col-md-3 col-sm-12 rounded-end-4">
        
        <!-- Login User Name and image Section Start -->
        <?php
        include "profiles.php";
        ?>
        <!-- Login User Name and image Section End -->

        <br>
        <ul class="navbar-nav ps-3">
        <li style="background-color: #f0f7fc;" class="nav-item mt-4 rounded-start-pill  ps-3 shadow text-primary-emphasis fw-semibold fs-5 ">
          <a class="nav-link" href="Dashboard_admin.php">Admin</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="user.php">Users</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Drivers.php">Drivers</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Ambulance</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="dispatch.php">Dispatch</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="emergency_requests.php">Emergency Requests</a>
        </li>
        <li class="mt-4 text-light ps-3 fw-semibold fs-5 d-flex">
          <img class="" src="../admin_image/logout.png" alt="">
          <a class="nav-link" href="registration_system/logout.php">Logout</a>
        </li>
        <br>
        </ul>

        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 text-center ">
          <!-- Row Count Work Started -->
          <div class="container p-3 rounded-4">
            <div class="row">
                <!-- Admins Count Work Start -->
                <div class="col-lg-4 col-sm-6 mt-4">
                  <a class="text-decoration-none" href="Dashboard_admin.php">
                    <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                      <?php
                      $sql = "SELECT * FROM admin";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                      <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                        <!-- <i class="bi bi-people-fill text-success fs-1> -->
                        <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Admins</h1>
                      </div>
                      <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                      <br>
                    </div>
                  </a>
                </div>
                <!-- Admins Count Work End -->


                <!-- Admins Count Work Start -->
                <div class="col-lg-4 col-sm-6 mt-4">
                  <a class="text-decoration-none" href="drivers.php">
                    <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                      <?php
                      $sql = "SELECT * FROM drivers";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                      <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                        <!-- <i class="bi bi-people-fill text-success fs-1> -->
                        <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Drivers</h1>
                      </div>
                      <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                      <br>
                    </div>
                  </a>
                </div>
                <!-- Admins Count Work End -->

                <!-- Admins Count Work Start -->
                <div class="col-lg-4 col-sm-6 mt-4">
                  <a class="text-decoration-none" href="Ambulance.php">
                    <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                      <?php
                      $sql = "SELECT * FROM ambulances";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                      <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                        <!-- <i class="bi bi-people-fill text-success fs-1> -->
                        <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Ambulances</h1>
                      </div>
                      <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                      <br>
                    </div>
                  </a>
                </div>
                <!-- Admins Count Work End -->

            </div>

            <div class="row">
              <!-- Admins Count Work Start -->
              <div class="col-lg-4 col-sm-6 mt-5">
                <a class="text-decoration-none" href="user.php">
                  <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                    <?php
                    $sql = "SELECT * FROM users";
                    $run = mysqli_query($con , $sql);
                    $count = mysqli_num_rows($run);
                    ?>
                    <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                      <!-- <i class="bi bi-people-fill text-success fs-1> -->
                      <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Users</h1>
                    </div>
                    <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                    <br>
                  </div>
                </a>
              </div>
              <!-- Admins Count Work End -->


              <!-- Admins Count Work Start -->
              <div class="col-lg-4 col-sm-6 mt-5">
                <a class="text-decoration-none" href="emergency_requests.php">
                  <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                    <?php
                    $sql = "SELECT * FROM emergency_requests where assigned_driver_id IS NULL";
                    $run = mysqli_query($con , $sql);
                    $count = mysqli_num_rows($run);
                    ?>
                    <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                      <!-- <i class="bi bi-people-fill text-success fs-1> -->
                      <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Emergency Requests</h1>
                    </div>
                    <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                    <br>
                  </div>
                </a>
              </div>
              <!-- Admins Count Work End -->

              <!-- Admins Count Work Start -->
              <div class="col-lg-4 col-sm-6 mt-5">
                <a class="text-decoration-none" href="Ambulance.php">
                  <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                    <?php
                    $sql = "SELECT * FROM dispatch";
                    $run = mysqli_query($con , $sql);
                    $count = mysqli_num_rows($run);
                    ?>
                    <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                      <!-- <i class="bi bi-people-fill text-success fs-1> -->
                      <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Dispatch</h1>
                    </div>
                    <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                    <br>
                  </div>
                </a>
              </div>
              <!-- Admins Count Work End -->

          </div>


          <div class="row">
              

              <!-- Admins Count Work Start -->
              <div class="col-lg-6 col-sm-6 mt-5">
                <a class="text-decoration-none" href="Emergencyrequest.php">
                  <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                    <?php
                    $sql = "SELECT * FROM medicalprofiles";
                    $run = mysqli_query($con , $sql);
                    $count = mysqli_num_rows($run);
                    ?>
                    <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                      <!-- <i class="bi bi-people-fill text-success fs-1> -->
                      <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Medical Profiles</h1>
                    </div>
                    <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                    <br>
                  </div>
                </a>
              </div>
              <!-- Admins Count Work End -->

              <!-- Admins Count Work Start -->
              <div class="col-lg-6 col-sm-6 mt-5">
                <a class="text-decoration-none" href="Ambulance.php">
                  <div style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);" class="rounded-4">
                    <?php
                    $sql = "SELECT * FROM feedback";
                    $run = mysqli_query($con , $sql);
                    $count = mysqli_num_rows($run);
                    ?>
                    <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                      <!-- <i class="bi bi-people-fill text-success fs-1> -->
                      <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Feedback</h1>
                    </div>
                    <h2 class="text-white text-end px-4"><?php echo $count?></h1>
                    <br>
                  </div>
                </a>
              </div>
              <!-- Admins Count Work End -->

          </div>

          

          </div>
          <!-- Row Count Work End -->
          <!-- <br> -->

<!-- ------------------------------------------------------------------------------------------------------- -->
        </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>