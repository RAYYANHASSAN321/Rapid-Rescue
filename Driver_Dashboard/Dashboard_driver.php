<?php
    include "connection.php";
    include "registration_system/signinsession.php";

    if(!isset($_SESSION['driver_id'])){
      header('location:login_register.php');
      exit;
  }

  // Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_id = $_POST['request_id'];  // Get the request ID from the form
  $new_status = $_POST['status'];  // Get the selected status from the form
  
  // Update the status in the database
  $query = "UPDATE emergency_requests SET status = '$new_status' WHERE id = $request_id AND assigned_driver_id = {$_SESSION['driver_id']}";
  
  if (mysqli_query($con, $query)) {
      $_SESSION['message'] = "Status updated successfully.";
  } else {
      $_SESSION['error'] = "Failed to update status.";
  }
  
  // Redirect back to the driver dashboard or any other page
  header('Location: Dashboard_driver.php');
  exit();
}

  

  $driver_id = $_SESSION['driver_id'];

// Fetch assigned emergency request
$query = "SELECT * FROM emergency_requests WHERE assigned_driver_id = $driver_id AND status != 'completed'";
$result = mysqli_query($con, $query);
$request = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- Leaflet.js -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    #map {
      height: 250px;
      width: 100%;
    }

    .status-notification {
      margin: 20px 0;
      padding: 15px;
      border-radius: 5px;
      background-color: #f8f9fa;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .status-notification h2 {
      margin-bottom: 15px;
    }

    .status-notification p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .status-dropdown {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .status-dropdown select {
      margin-left: 10px;
    }

    .status-completed {
      background-color: #d4edda;
      /* Green background for completed */
      color: #155724;
    }

    .status-enroute {
      background-color: #fff3cd;
      /* Yellow background for en-route */
      color: #856404;
    }

    .status-arrived {
      background-color: #cce5ff;
      /* Light blue background for arrived */
      color: #004085;
    }

    .status-transporting {
      background-color: #f8d7da;
      /* Red background for transporting */
      color: #721c24;
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
          <li style="background-color: #f0f7fc;"
            class="nav-item mt-4 rounded-start-pill  ps-3 shadow text-primary-emphasis fw-semibold fs-5 ">
            <a class="nav-link" href="Dashboard_driver.php">Driver</a>
          </li>
          <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
            <a class="nav-link active" aria-current="page" href="user.php">Users</a>
          </li>
          <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
            <a class="nav-link active" aria-current="page" href="">Emergency Requests</a>
          </li>
          <li class="mt-4 text-light ps-3 fw-semibold fs-5 d-flex">
            <img class="" src="../admin_image/logout.png" alt="">
            <a class="nav-link" href="registration_system/logout.php">Logout</a>
          </li>
          <br>
        </ul>

      </div>

      <div class="col-lg-9 col-md-9 col-sm-12 text-center">
        <!-- Row Count Work Started -->
        <div class="container p-3 rounded-4">

          <div class="row">
            <!-- Driver Information and Task -->
            <div class="status-notification 
              <?php
                  // Add class based on status
                  switch ($request['status']) {
                      case 'en-route':
                          echo 'status-enroute';
                      break;
                      case 'arrived':
                          echo 'status-arrived';
                      break;
                      case 'transporting':
                          echo 'status-transporting';
                      break;
                      case 'completed':
                          echo 'status-completed';
                      break;
                  }
              ?>
          ">
              <?php if ($request): ?>
              <h2>Current Emergency</h2>
              <p><strong>Patient:</strong>
                <?php echo $request['patient_name']; ?>
              </p>
              <p><strong>Pickup:</strong>
                <?php echo $request['pickup_address']; ?>
              </p>
              <p><strong>Destination:</strong>
                <?php echo $request['destination_address']; ?>
              </p>
              <p><strong>Status:</strong>
                <?php echo ucfirst($request['status']); ?>
              </p>

              <!-- Dropdown for status update -->
              <div class="status-dropdown">
                <label for="status">Update Status:</label>
                <form method="POST" action="update_status.php" style="display: inline;">
                  <input type="hidden" name="request_id" value="<?php echo $request['request_id']; ?>">
                  <!-- Pass request ID -->
                  <select name="status" id="status">
                    <option value="en-route" <?php if ($request['status']=='en-route' ) echo 'selected' ; ?>>En-route
                    </option>
                    <option value="arrived" <?php if ($request['status']=='arrived' ) echo 'selected' ; ?>>Arrived
                    </option>
                    <option value="transporting" <?php if ($request['status']=='transporting' ) echo 'selected' ; ?>
                      >Transporting</option>
                    <option value="completed" <?php if ($request['status']=='completed' ) echo 'selected' ; ?>>Completed
                    </option>
                  </select>
                  <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
              </div>
              <?php else: ?>
              <p>No current emergencies assigned.</p>
              <?php endif; ?>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <!-- Map Display -->
              <div id="map"></div>
            </div>
          </div>

          <div class="row">
            <!-- Admins Count Work Start -->
            <div class="col-lg-6 col-sm-6 mt-3">
              <a class="text-decoration-none" href="Dashboard_admin.php">
                <div
                  style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);"
                  class="rounded-4">
                  <?php
                      $sql = "SELECT * FROM drivers where driverid = $driver_id";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                  <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                    <!-- <i class="bi bi-people-fill text-success fs-1> -->
                    <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Driver</h1>
                  </div>
                  <h2 class="text-white text-end px-4">
                    <?php echo $count?>
                    </h1>
                    <br>
                </div>
              </a>
            </div>
            <!-- Admins Count Work End -->

            <!-- Admins Count Work Start -->
            <div class="col-lg-6 col-sm-6 mt-3">
              <a class="text-decoration-none" href="Dashboard_admin.php">
                <div
                  style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);"
                  class="rounded-4">
                  <?php
                      $sql = "SELECT * FROM users ";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                  <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                    <!-- <i class="bi bi-people-fill text-success fs-1> -->
                    <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Users</h1>
                  </div>
                  <h2 class="text-white text-end px-4">
                    <?php echo $count?>
                    </h1>
                    <br>
                </div>
              </a>
            </div>
            <!-- Admins Count Work End -->


          </div>

          <div class="row">
            <!-- Admins Count Work Start -->
            <div class="col-lg-12 col-sm-12 mt-3">
              <a class="text-decoration-none" href="update_status.php">
                <div
                  style="background:#B71C1C;height: 230px; box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-webkit-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);-moz-box-shadow: -13px 10px 22px -6px rgba(0,0,0,0.62);"
                  class="rounded-4">
                  <?php
                      $sql = "SELECT * FROM emergency_requests";
                      $run = mysqli_query($con , $sql);
                      $count = mysqli_num_rows($run);
                      ?>
                  <div style="background-color: #ffebee;border-radius:0px 0px 500px 0px;" class="d-flex p-5 shadow">
                    <!-- <i class="bi bi-people-fill text-success fs-1> -->
                    <h1 class="text-primary-emphasis fw-bold fs-5 mt-0 ms-0">Emergency Requests</h1>
                  </div>
                  <h2 class="text-white text-end px-4">
                    <?php echo $count?>
                    </h1>
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
  <!-- JavaScript for Geolocation and Leaflet.js Map -->
  <script>
    // Initialize map
    var map = L.map('map').setView([24.8607, 67.0011], 13);  // Set initial view (Karachi coordinates)

    // Load and display map tiles from OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      // attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Marker for the ambulance (driver's position)
    var marker = L.marker([24.8607, 67.0011]).addTo(map).bindPopup("Your Location");

    // Update location in real-time using Geolocation API
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(function (position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;

        // Update marker position
        marker.setLatLng([lat, lon]);

        // Center map on the new location
        map.setView([lat, lon], 13);
      }, function (error) {
        console.log("Error in getting location: " + error.message);
      }, {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      });
    } else {
      alert("Geolocation is not supported by your browser.");
    }

    // AJAX Status Update
    $('#update-status').click(function () {
      var selectedStatus = $('#status').val();  // Get the selected status

      $.ajax({
        url: 'update_status_ajax.php',  // URL of the server-side script
        type: 'POST',
        data: { status: selectedStatus },  // Send the selected status as POST data
        success: function (response) {
          $('#current-status').text(selectedStatus);  // Update the status display
          $('#status-message').text("Status updated successfully!").css("color", "green");
        },
        error: function () {
          $('#status-message').text("Error updating status. Please try again.").css("color", "red");
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>