<?php

include "connection.php";
include "registration_system/signinsession.php";

if(!isset($_SESSION['userid'])){
  header('location:login_register.php');
  exit;
}
// Check if the request_id and driver_id are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request_id']) && isset($_POST['driver_id'])) {
    $request_id = $_POST['request_id'];
    $driver_id = $_POST['driver_id'];

    // Assign the driver to the emergency request
    $query = "UPDATE emergency_requests SET assigned_driver_id = $driver_id WHERE request_id = $request_id";
    
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Driver assigned successfully!";
    } else {
        $_SESSION['error'] = "Error assigning driver. Please try again.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to admin assign page
header("Location: emergency_requests.php");
exit();
?>