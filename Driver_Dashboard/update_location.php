<?php
include 'connection.php'; // Include your database connection
include "registration_system/signinsession.php"; // Include session management

// Ensure the driver is logged in
if (!isset($_SESSION['driver_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Driver not logged in']);
    exit;
}

$driver_id = $_SESSION['driver_id']; // Get the driver's ID from the session

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lat = $_POST['lat'];  // Get the latitude from POST request
    $lon = $_POST['lon'];  // Get the longitude from POST request

    // Validate latitude and longitude
    if ($lat && $lon) {
        // Update driver's location in the database
        $query = "UPDATE drivers SET location_latitude = ?, location_longitude = ? WHERE driverid = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ddi", $lat, $lon, $driver_id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Location updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update location']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid latitude or longitude']);
    }
}
?>
