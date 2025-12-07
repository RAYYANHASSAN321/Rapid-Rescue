<?php
include "registration_system/signinsession.php";
include "registration_system/connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/amblogo1.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/amblogo1.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/amblogo1.png">
    <link rel="manifest" href="images/amblogo1.png">
    <title>Rapid Rescue</title>

    <style>

    </style>
</head>

<style>
  .action {
  position: relative;
  /* top: 20px; */
  /* right: 30px; */
}

.action .profile {
  position: relative;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.action .profile img {
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.action .menu {
  position: absolute;
  top: 120px;
  right: -10px;
  padding: 10px 20px;
  background: #ffffff;
  width: 300px;
  box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  transition: 0.5s;
  visibility: hidden;
  opacity: 0;
}

.action .menu.active {
  top: 70px;
  visibility: visible;
  opacity: 1;
  z-index: 1;
}

@media screen and (max-width:800px) {
    .action .menu.active {
    top: 70px;
    right: -2px;
    visibility: visible;
    opacity: 1;
    }
}

.action .menu::before {
  content: "";
  position: absolute;
  top: -5px;
  right: 28px;
  width: 20px;
  height: 20px;
  background: #fff;
  transform: rotate(45deg);
}

.action .menu h3 {
  width: 100%;
  text-align: center;
  font-size: 18px;
  padding: 10px 0;
  font-weight: 500;
  color: #555;
  line-height: 1.5em;
}

.action .menu h3 span {
  font-size: 16px;
  color: #696969;
  font-weight: 300;
}

.action .menu ul li {
  list-style: none;
  padding: 16px 0;
  display: flex;
  /* border-style: ; */
  align-items: center;
}

.action .menu ul li img {
  max-width: 20px;
  margin-right: 10px;
  opacity: 0.5;
  transition: 0.5s;
}

.action .menu ul li:hover img {
  opacity: 1;
}

.action .menu ul li a {
  display: inline-block;
  text-decoration: none;
  color: #555;
  font-weight: 500;
  transition: 0.5s;
}

.action .menu ul li:hover a {
  color: #5eff00;
}

.navbar {
        background-color: White;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: all 1s;
}



.emergency-contact {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: all 1s;
        }

        .emergency-contact:hover {
            background-color: darkred;
            transition: all 1s;
        }
</style>


<!-- Navbar Section -->
<!-- <div style="backdrop-filter: blur(5px);" class="shadow"> -->
        <nav class="navbar navbar-expand-lg fixed-top">

            <div class="container">
                <a class="navbar-brand p-0 m-0" href="index.php"><img class="me-1 m-0 p-0"
                        src="images/ambulancelogo.png" alt="logo" width="130"></a>
                        <!-- <span class="ms-2"><a class="text-decoration-none text-danger mb-0 fs-4" href="#">Rapid Rescue</a></span> -->
                <button style="background-color: rgb(62,140,255);border-radius: 30px"
                    class="bi bi-list fs-5 fw-bold navbar-toggler btn btn-primary" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">

                </button>
                <div class="collapse navbar-collapse justify-content-end navbar-links text-white" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item menus">
                            <a class="nav-link text-black me-4" href="index.php">Home</a>
                        </li>
                        <li class="nav-item menus">
                            <a class="nav-link text-black me-4" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item menus">
                            <a class="nav-link text-black me-4" href="contact_process.php">Contact Us</a>
                        </li>
                        <li class="nav-item menus">
                            <a class="nav-link text-black me-4" href="emergency_request.php">Emergency Request</a>
                        </li>
                    <?php 
                        if(isset($_SESSION['userid'])){
                    ?>
                        


                   
                    <div class="action">
                        <li class='nav-item d-flex justify-content-center align-items-center px-3 p-1 rounded-5 text-white me-2' data-bs-theme='dark' onclick="menuToggle()">
                            <img class="rounded-circle" src="<?php echo "registration_system/images/".$row1['u_img'] ?>" width="40" height="40" alt="">
                            <!-- <i class="bi bi-chevron-down fw-bold text-black ms-1"></i></h6> -->
                        </li>

                        
                        <div class="menu shadow">
                            <div class="text-center my-2">
                                <img class="rounded-circle" src="<?php echo "registration_system/images/".$row1['u_img'] ?>" width="70" height="70" alt="">
                            </div>
                            <h3><?php echo $row1['u_email'];?><br /><span><?php echo $row1['u_name'];?></span></h3>
                            <ul>
                            <!-- <li>
                                <img src="./assets/icons8-appointment-50.png" /><a href="myappointments.php?myappointments=<?php echo $row1['u_id']?>">My Appointments</a>
                            </li> -->
                            <li>
                                <img src="images/healthcare.png" /><a href="medicalprofile.php">Your Medical Profile</a>
                            </li>
                            <form action="editprofile.php" method="POST">
                            <li>
                                <img src="./assets/icons/edit.png" /><a href="editprofile.php?editid=<?php echo $row1['u_id']?>">Edit Profile</a>
                            </li>
                            </form>
                            
                            <li>
                                <img src="./assets/icons/log-out.png" /><a href="registration_system/logout.php">Logout</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }

                        else{
                            echo "
                            <li class='nav-item text-white d-flex px-3 rounded-5 me-2' data-bs-theme='dark' style='background-color: #b71c1c;'>
                            <i class='bi bi-people-fill fs-4 mt-1'></i>
                            <a class='nav-link text-white fs-6' href='registration_system/login_register.php'>Login / Register</a>
                            </li>
                            ";
                        }
                    ?>
                       
                        
                        
                    

                
                        
                        <!-- <button class="appointmentBtn btn btn-primary rounded-5"><img class="" src="images/calender.svg" alt="">APPOINTMENT</button> -->
                    </ul>
                </div>
            </div>
        </nav>

    <!-- </div> -->

    
      <script>
        function menuToggle() {
          const toggleMenu = document.querySelector(".menu");
          toggleMenu.classList.toggle("active");
        }
      </script>


<div class="emergency-contact" id="emergencyButton">
    Emergency? Call Now
</div>



<script>

 // Open the emergency contact numbers when the button is clicked
 document.getElementById("emergencyButton").onclick = function() {
        alert("Call one of the emergency contacts:\n\n1) +92-030-2246-3548\n2) +92-033-7033-5983\n3) +92-034-9183-3008");
    };

</script>