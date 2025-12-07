<?php
include "connection.php";
    session_start();
    $wrong = false;
     
    if(isset($_POST['signin'])){
        $email = $_POST['uemail'];
        $password = $_POST['upassword']; 

        $queryy = "SELECT * FROM drivers WHERE d_email = '$email' AND d_password = '$password'";
        $run = mysqli_query($con , $queryy);
        $row = mysqli_fetch_array($run);

        if(mysqli_num_rows($run) == 1){
            $_SESSION['driver_id'] = $row['driverid'];
            header('location:Dashboard_driver.php');
        }

        else{

          echo "<script>
          alert('wrong username or password');
          </script>";
      }
    }
    
    
    
    

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="register.css">
  <title>Log-in</title>


</head>

<body>



  <div class="container">


    <div class="forms-container">
      <div class="signin-signup">

        <form action="" method="POST" class="sign-in-form">

          <h2 class="title">Log In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="uemail" required placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="upassword" required placeholder="Password" />
          </div>
          <input type="submit" name="signin" value="Login" class="btn solid" />
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Welcome back to Rapid Rescue! We're glad to see you again.
            Your trusted partner in emergency care is just a login away.
          </p>

          </p>
        </div>
        <img src="images/amb_2.png" class="image" alt="" />
      </div>
    </div>
  </div>



  <script src="register.js"></script>



</body>

</html>