<?php
include "connection.php";
    // $wrong = false;
    session_start();
     
    if(isset($_POST['signin'])){
        $email = $_POST['uemail'];
        $password = $_POST['upassword']; 

        $queryy = "SELECT * FROM users WHERE u_email = '$email' AND u_password = '$password'";
        $run = mysqli_query($con , $queryy);
        $row = mysqli_fetch_array($run);

        if(mysqli_num_rows($run) == 1){
            $_SESSION['userid'] = $row['u_id'];
            $_SESSION['username'] = $row['u_name'];
            header('location:../index.php');
        }

        else{

          echo "<script>
          alert('wrong username or password');
          </script>";
      }
    }
    

?>

<?php

    $success = false;
    if(isset($_POST['signup'])){
        $name = $_POST['uname'];
        $email = $_POST['uemail'];
        $password = $_POST['upassword'];
        $image = $_FILES['uimage']['name'];
        $imgpath = $_FILES['uimage']['tmp_name'];
        move_uploaded_file($imgpath,'images/'.$image);
        
        $query = "INSERT INTO users (u_name , u_email , u_password , u_img) VALUES ('$name', '$email' , '$password' , '$image');";
        $runn = mysqli_query($con , $query);

        if($runn){

            echo "
            <script>
                alert('Account Created Successfully');
                window.location.href='login_register.php';
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
<link rel="stylesheet" href="register.css">
    <title>Log-in And Sign-up</title>


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
            <input onclick="history.back()" type="submit" value="Cancel" class="btn solid" style="background-color: gray;" />
          </form>
          
  
          <form action="login_register.php" method="POST" enctype="multipart/form-data" class="sign-up-form"> 
          <h2 class="title">Sign Up</h2>
            <div class="input-field"> 
              <i class="fas fa-user"></i>
              <input type="text" name="uname" required placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="uemail" required placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="upassword" required placeholder="Password" />
            </div>
            <div class="input-field">
  
    <i class="fas fa-image"></i>
    <label>
    Choose an Image
  <input type="file" id="uimage" name="uimage" required accept="image" />
  </label>

</div>
            <input type="submit" class="btn" name="signup" value="Register" />
            <input onclick="history.back()" type="submit" value="Cancel" class="btn solid" style="background-color: gray;">
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            Welcome to Rapid Rescue, you gain access to our swift ambulance services, ensuring you or your loved ones receive immediate care in emergencies.

</p>
            <button class="btn transparent" id="sign-up-btn">
              Sign Up
            </button>
          </div>
          <img src="../images/amb_2.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
            Welcome back to Rapid Rescue! We're glad to see you again.
             Your trusted partner in emergency care is just a login away.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Log In
            </button>
          </div>
          <img src="../images/amb_1.png" class="image" alt="" />
        </div>
      </div>
    </div>

  

<script src="register.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {
    // Target the form
    const signInForm = document.querySelector(".sign-in-form");
    const signUpForm = document.querySelector(".sign-up-form");

    // Add event listener for keydown (better for cross-browser compatibility)
    signInForm.addEventListener("keydown", function (event) {
      // Check if the pressed key is "Enter" (key code 13)
      if (event.keyCode === 13) {
        event.preventDefault(); // Prevent default behavior
        signInForm.querySelector("input[type=submit]").click(); // Trigger the submit button click
      }
    });
    signUnForm.addEventListener("keydown", function (event) {
      // Check if the pressed key is "Enter" (key code 13)
      if (event.keyCode === 13) {
        event.preventDefault(); // Prevent default behavior
        signUnForm.querySelector("input[type=submit]").click(); // Trigger the submit button click
      }
    });
  });

</script>
    
  </body>
</html>