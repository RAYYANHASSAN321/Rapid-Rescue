<?php

include 'navbar.php'; 
include "registration_system/connection.php";


// Handle form submission and save medical profile
if(isset($_POST['send'])){
    $patientname = $_POST['patientname'];
    $pickupaddress = $_POST['pickupaddress'];
    $destinationaddress = $_POST['destinationaddress'];
    $healthcondition = $_POST['healthcondition'];
    $priority = $_POST['priority'];
    $pickuplatitude = $_POST['pickuplatitude'];
    $pickuplongitude = $_POST['pickuplongitude'];
    
    $query = "INSERT INTO emergency_requests (patient_name , pickup_address , destination_address , health_condition , priority , pickup_latitude , pickup_longitude) VALUES ('$patientname','$pickupaddress','$destinationaddress','$healthcondition','$priority','$pickuplatitude','$pickuplongitude')";
     $runn = mysqli_query($con , $query);

    if($runn){

        echo "
        <script>
            alert('Account Created Successfully');
            window.location.href='index.php';
        </script>
        ";

        // $success = true;
        // header('location: signin.php');
    }
};



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Medical Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
    body {
        background-color: #e9ecef; /* Slightly darker background for contrast */
        font-family: Arial, sans-serif;
    }

    .medical {
        width: 90%;
        max-width: 800px;
        margin: 150px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
        font-size: 2.5rem;
    }

    .message {
        color: #b71c1c; /* Enhanced red color for messages */
        font-size: 18px;
        margin: 20px 0;
        text-align: center;
    }

    .profile-form label {
        font-weight: bold;
        color: #b71c1c; /* Color for labels */
    }

    .profile-form input, 
    .profile-form select, 
    .profile-form textarea {
        width: 100%;
        padding: 12px;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 2px solid #b71c1c; /* Red border */
        transition: border-color 0.3s;
    }

    .profile-form input:focus,
    .profile-form select:focus,
    .profile-form textarea:focus {
        border-color: #900c0c; /* Darker red on focus */
        outline: none;
    }

    .profile-form button {
        padding: 12px 20px;
        background-color: #b71c1c; /* Button color */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .profile-form button:hover {
        background-color: #900c0c; /* Darker red on hover */
        transform: scale(1.05); /* Slight scale effect */
    }

    .profile-data {
        margin-top: 20px;
        border: 2px solid #dee2e6; /* Thicker border */
        padding: 20px;
        border-radius: 5px;
        background-color: #f8f9fa;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-data p {
        margin: 10px 0;
        font-size: 1.1rem; /* Increased font size for better readability */
    }

    a.edit-link {
        display: inline-block;
        margin-top: 10px;
        color: #b71c1c; /* Link color matching the theme */
        text-decoration: none;
        font-weight: bold;
    }

    a.edit-link:hover {
        text-decoration: underline;
        color: #900c0c; /* Darker red on hover */
    }
</style>
</head>
<body>

<!-- <div class="container medical">
    <h2>Medical </h2> -->
<br><br><br>
  
<div class="container" style="margin: 30px; padding: 30px;">
        <form method="POST" class="profile-form">
            
   

            <label for="patientname">Patient Name :</label>
            <input type="text" name="patientname" required>

            <label for="pickupaddress">Pick up Address :</label>
            <input type="text" name="pickupaddress" id="pickupaddress" required>

            <label for="destinationaddress">Destination Address :</label>
            <input type="text" name="destinationaddress" id="destinationaddress" required>

            <label for="healthcondition">Health Condition:</label>
            <input type="text" name="healthcondition" required>

            <label for="priorities">Select Priorities:</label>
            <select>Priorities
                <option value="basic">Basic</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <label for="pickuplatitude">Latitude:</label>
            <input type="text" name="pickuplatitude" id="latitude" required>

            <label for="pickuplongitude">Longitude:</label>
            <input type="text" name="pickuplongitude" id="longitude" required>

            <button type="submit" name="send">Send Request</button>
            
            <button type="button" onclick="getCoordinates()">Get Coordinates</button>
        </form>

        </div>


<!-- Leaflet Map (Optional for showing locations) -->
<div id="map"></div>

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
// Initialize the map (center on default location)
var map = L.map('map').setView([24.8607, 67.0011], 12);

// Add OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Add marker (optional, can be used to show user-selected location)
var marker = L.marker([24.8607, 67.0011]).addTo(map);

// Function to get coordinates for pickup and destination addresses
function getCoordinates() {
    var pickupAddress = document.getElementById('pickupaddress').value;
    var destinationAddress = document.getElementById('destinationaddress').value;

    if (pickupAddress) {
        getLatLon(pickupAddress, function(lat, lon) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            // Update marker on the map for pickup location
            marker.setLatLng([lat, lon]);
            map.setView([lat, lon], 13);
        });
    }
}

// Function to get latitude and longitude from address using Nominatim API
function getLatLon(address, callback) {
    var url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                var lat = data[0].lat;
                var lon = data[0].lon;
                callback(lat, lon);
            } else {
                alert('Address not found!');
            }
        })
        .catch(error => console.error('Error:', error));
}

</script>


</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include "footer.php"; ?>


</body>
</html>
