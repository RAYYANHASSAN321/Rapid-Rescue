<?php
include "connection.php";
include "registration_system/signinsession.php";

if (!isset($_SESSION['driver_id'])) {
    header('location:login_register.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_id = $_POST['request_id'];
  $new_status = $_POST['status'];

  // Update the status in the database
  $query = "UPDATE emergency_requests SET status = '$new_status' WHERE request_id = $request_id AND assigned_driver_id = {$_SESSION['driver_id']}";
  
  if (mysqli_query($con, $query)) {
      $_SESSION['message'] = "Status updated successfully.";
  } else {
      $_SESSION['error'] = "Failed to update status.";
  }

  // Redirect back to the driver dashboard
  header("Location: Dashboard_driver.php");
  exit;
}

$driver_id = $_SESSION['driver_id']; // Get the logged-in driver's ID




// Fetch assigned emergency requests for the driver
$query = "SELECT * FROM emergency_requests WHERE assigned_driver_id = $driver_id";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f0f7fc;">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12" style="min-height: 100vh;background:#b71c1c;">
            <?php include "profiles.php"; ?>

            <ul class="navbar-nav ps-3">
        <li style="background-color: #f0f7fc;" class="nav-item mt-4 rounded-start-pill  ps-3 shadow text-primary-emphasis fw-semibold fs-5 ">
          <a class="nav-link" href="Dashboard_driver.php">Driver</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="user.php">Users</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="">EMT</a>
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

        <div class="col-lg-9 col-md-9 col-sm-12 mt-3">
            <h2 class="text-center">Your Assigned Emergency Requests</h2>

            <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);
            }

            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
                unset($_SESSION['error']);
            }
            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Pickup Address</th>
                            <th>Destination Address</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display assigned emergency requests for the driver
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['patient_name']; ?></td>
                            <td><?php echo $row['pickup_address']; ?></td>
                            <td><?php echo $row['destination_address']; ?></td>
                            <td><?php echo ucfirst($row['priority']); ?></td>
                            <td><span id="status_<?php echo $row['request_id']; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                            <td>
                                <form method="POST" action="update_status.php">
                                    <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
                                    <select name="status" class="form-control">
                                        <option value="en-route" <?php if ($row['status'] == 'en-route') echo 'selected'; ?>>En-route</option>
                                        <option value="arrived" <?php if ($row['status'] == 'arrived') echo 'selected'; ?>>Arrived</option>
                                        <option value="transporting" <?php if ($row['status'] == 'transporting') echo 'selected'; ?>>Transporting</option>
                                        <option value="completed" <?php if ($row['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No assigned emergency requests.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
