<?php
include "registration_system/connection.php";
include "navbar.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapid Rescue - Our Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
    <link rel="stylesheet" href="jquery.js">
    <link rel="manifest" href="images/logo.png">
    <style>
        body {
            background-color: #f7f8fa;

        }
        .service-header {
            text-align: center;
            margin-top: 120px;
            background:ima;
        }
        .service-header h1 {
            color: #ff4c4c;
            font-weight: bold;
        }
        .service-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 250px; /* Ensures all cards have the same height */
        }
        .service-card h3 {
            color: #ff4c4c;
        }
        .service-card p {
            color: #333;
            flex-grow: 1; /* Ensures the content stretches evenly */
        }
        .icon {
            font-size: 40px;
            color: #ff4c4c;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #ff4c4c;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #e64343;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="service-header">
            <h1>Our Services</h1>
            <p>Delivering life-saving solutions with speed and professionalism</p>
        </div>

        <div class="row">
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-lightning-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>Quick and Simple Booking</h3>
                        <p>Book an ambulance in seconds with our user-friendly interface, ensuring fast and reliable assistance during emergencies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-person-badge-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>Certified Medical Professionals</h3>
                        <p>Our ambulances are staffed with licensed paramedics and medical professionals, ready to handle any emergency with expert care.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-telephone-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>Emergency Contact on Homepage</h3>
                        <p>Get instant help with just one click from our homepage emergency contact feature, ensuring quick response during critical situations.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-clock-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>24/7 Availability</h3>
                        <p>No matter the time, day or night, Rapid Rescue is available to provide emergency medical services anytime, anywhere.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-map-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>Real-Time Tracking</h3>
                        <p>Track your ambulance’s location in real time to stay updated on arrival times, ensuring peace of mind during emergencies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="service-card">
                    <div class="text-center">
                        <div class="icon">
                            <i class="bi bi-check-circle-fill"></i> <!-- Bootstrap Icon -->
                        </div>
                        <h3>Instant Confirmation</h3>
                        <p>Receive instant confirmation once your ambulance booking is processed, giving you confidence that help is on the way.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="contact_process.php" class="btn btn-primary">Contact Us Now</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>

<br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
 <?php
 include "footer.php"
 ?>
    <script src="js/bootstrap.bundle.js"></script>

</body>
</html>
