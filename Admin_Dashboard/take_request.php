<?php

include "connection.php";
include "registration_system/signinsession.php";

if(!isset($_SESSION['userid'])){
    header('location:login_register.php');
    exit;
}

$driver_id = $_SESSION['driver_id'];

// Check if the request_id is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request_id'])) {
    $request_id = $_POST['request_id'];

    // Update the emergency request to assign the driver
    $query = "UPDATE emergency_requests SET assigned_driver_id = $driver_id WHERE request_id = $request_id AND assigned_driver_id IS NULL";
    
    if (mysqli_query($con, $query)) {
        // Check if the update affected any rows (i.e., the request was not already taken)
        if (mysqli_affected_rows($con) > 0) {
            $_SESSION['message'] = "You have successfully taken the request.";
        } else {
            $_SESSION['error'] = "This request has already been taken by another driver.";
        }
    } else {
        $_SESSION['error'] = "Error taking the request. Please try again.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to available requests page
header("Location: Dashboard_admin.php");
exit();
?>
