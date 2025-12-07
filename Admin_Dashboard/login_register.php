<?php
include "connection.php";
    session_start();
    $wrong = false;
     
    if(isset($_POST['signin'])){
        $email = $_POST['uemail'];
        $password = $_POST['upassword']; 

        $queryy = "SELECT * FROM admin WHERE a_email = '$email' AND a_password = '$password'";
        $run = mysqli_query($con , $queryy);
        $row = mysqli_fetch_array($run);

        if(mysqli_num_rows($run) == 1){
            $_SESSION['userid'] = $row['a_id'];
            $_SESSION['username'] = $row['a_name'];
            header('location:Dashboard_admin.php');
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
    $name = $_POST['dname'];
    $email = $_POST['demail'];
    $password = $_POST['dpassword'];
    $imagename = $_FILES['dimage']['name'];
    $imgpath = $_FILES['dimage']['tmp_name'];
    move_uploaded_file($imgpath ,'images/'.$imagename);
    

    $query = "INSERT INTO admin (a_name , a_email ,a_password , a_image) VALUES ('$name', '$email' , '$password' , '$imagename');";
    $runn = mysqli_query($con , $query);

    if($runn){

        echo "
        <script>
            alert('Account Created Successfully');
            window.location.href='login_register.php';
        </script>
        ";

        // $success = true;
        // header('location: .php');
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
          </form>
          
  
          <form action="login_register.php" method="POST" enctype="multipart/form-data" class="sign-up-form"> 
          <h2 class="title">Sign Up</h2>
            <div class="input-field"> 
              <i class="fas fa-user"></i>
              <input type="text" name="dname" required placeholder="Username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="demail" required placeholder="Email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="dpassword" required placeholder="Password"/>
            </div>
            <!-- <div class="">
              <input type="file" name="dimage" required/>
            </div> -->
            <div class="input-field">
  
    <i class="fas fa-image"></i>
    <label>
    Choose an Image
  <input type="file" id="image" name="dimage" required accept="image" />
  </label>

</div>
            <input type="submit" class="btn" name="signup" value="Register" />
      
            
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
          <img src="images/amb_2.png" class="image" alt="" />
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
          <img src="images/amb_1.png" class="image" alt="" />
        </div>
      </div>
    </div>

  

<script src="register.js"></script>


    
  </body>
</html>