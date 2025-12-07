<?php
include "registration_system/connection.php";
include "navbar.php";
// Capture form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $message = $_POST['message'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO contact_us (name, email, contact_number, message)
            VALUES ('$name', '$email', '$contact_number', '$message')";

    if ($con->query($sql) === TRUE) {
        echo "
        <script>
                alert('Message sent successfully!');
                window.location.href='index.php';
            </script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rapid Rescue</title>
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
        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        .form-control:focus {
            border-color: #ff4c4c;
            box-shadow: 0 0 0 0.2rem rgba(255, 76, 76, 0.25);
        }
        .btn-primary {
            background-color: #ff4c4c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #e64343;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-md-6">
                <div class="contact-form">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    <form action="contact_process.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                 
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                    <img style="max-height: 500px;width: 100%; height:auto;" class="img-fluid mt-5" src="images/amb_1.png" alt="">
                </div>
        </div>
    </div>
 <br>
 <?php
 include "footer.php"
 ?>
    <script src="js/bootstrap.bundle.js"></script>

</body>
</html>
