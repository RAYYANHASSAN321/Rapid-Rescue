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
  
    <style>
      .input-field{
        position: relative;
        }
        .input-field input,select
        {
        width: 100%;
        height: 60px;
        /* border-radius: 6px; */
        font-size: 18px;
        padding: 0 15px;
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        color: #fff;
        outline: none;
        }
        .input-field label{
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #fff;
        font-size: 19px;
        pointer-events: none;
        transition: 0.3s;
        }
        input:focus ~ label,
        input:valid ~ label{
        top: 0;
        left: 15px;
        font-size: 16px;
        padding: 0 2px;
        /* background: #060b23; */
        }
  </style>
  
  </head>
  <body style="background-color: #f0f7fc;">

    <!-- <h1 class="text-center bg-success-subtle p-4">Online Covid Test And Vaccination Booking Systen</h1> -->
  <div style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="container-fluid">
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
          <a class="nav-link active" aria-current="page" href="drivers.php">Drivers</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">EMT</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Ambulance</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Dispatch</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Emergency Requests</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Feedback</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Medical Profiles</a>
        </li>
        <li class="mt-4 text-light ps-3 fw-semibold fs-5 d-flex">
          <img class="" src="../admin_image/logout.png" alt="">
          <a class="nav-link" href="registration_system/logout.php">Logout</a>
        </li>
        <br>
        </ul>


            

          
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 text-center mt-3">
        <?php if (mysqli_num_rows($result) > 0): ?>
          <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Request ID</th>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Patient Name</th>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Pickup Address</th>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Destination</th>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Priority</th>
                    <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Assign Driver</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="border-bottom-5"><?php echo $row['request_id']; ?></td>
                    <td class="border-bottom-5"><?php echo $row['patient_name']; ?></td>
                    <td class="border-bottom-5"><?php echo $row['pickup_address']; ?></td>
                    <td class="border-bottom-5"><?php echo $row['destination_address']; ?></td>
                    <td class="border-bottom-5"><?php echo ucfirst($row['priority']); ?></td>
                    <td class="border-bottom-5">
                        <form method="POST" action="assigndriver.php">
                            <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
                            <select name="driver_id" class="form-control" required>
                                <option value="">Select Driver</option>
                                <?php while ($driver = mysqli_fetch_assoc($drivers_result)): ?>
                                    <option value="<?php echo $driver['driverid']; ?>">
                                        <?php echo $driver['D_name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Assign Driver</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>No unassigned emergency requests at the moment.</p>
    <?php endif; ?>
      
        </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>