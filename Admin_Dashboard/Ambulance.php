<?php
    include "connection.php";
    include "registration_system/signinsession.php";

    if(!isset($_SESSION['userid'])){
      header('location:login_register.php');
      exit;
    }
  
    if(isset($_POST['create'])){
      $vehicleNumber = $_POST['vehicleNumber'];
      $equipmentLevel = $_POST['equipmentLevel'];
      $status = $_POST['currentStatus'];


      $imagename = $_FILES['ambimage']['name'];
      $imgpath = $_FILES['ambimage']['tmp_name'];

      
    move_uploaded_file($imgpath, 'images/'.$imagename);


      $query = "INSERT INTO ambulances(vehicle_number, equipment_level , current_status , amb_image) VALUES ('$vehicleNumber','$equipmentLevel','$status','$imagename');";
      $run = mysqli_query($con , $query);

      if($run){
        echo "
          <script>
          alert('Ambulance Information Added');
          window.location.href='Ambulance.php';
          </script>
        ";
      }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <style>
      .input-field{
        position: relative;
        }
        .input-field input,select
        {
        width: 100%;
        height: 60px;
        /* border-radius: 6px; */
        font-size: 18px;
        padding: 0 15px;
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        color: #fff;
        outline: none;
        }
        .input-field label{
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #fff;
        font-size: 19px;
        pointer-events: none;
        transition: 0.3s;
        }
        input:focus ~ label,
        input:valid ~ label{
        top: 0;
        left: 15px;
        font-size: 16px;
        padding: 0 2px;
        /* background: #060b23; */
        }
  </style>
  
  </head>
  <body style="background-color: #f0f7fc;">

    <!-- <h1 class="text-center bg-success-subtle p-4">Online Covid Test And Vaccination Booking Systen</h1> -->
  <div style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="container-fluid">
    <div class="row">
        <div style="min-height: 100vh;background:#b71c1c;" class="shadow col-lg-3 col-md-3 col-sm-12 rounded-end-4">
        
        <!-- Login User Name and image Section Start -->
        <?php
        include "profiles.php";
        ?>
        <!-- Login User Name and image Section End -->

        <br>
        <ul class="navbar-nav ps-3">
        <li style="background-color: #f0f7fc;" class="nav-item mt-4 rounded-start-pill  ps-3 shadow text-primary-emphasis fw-semibold fs-5 ">
          <a class="nav-link" href="Dashboard_admin.php">Admin</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="user.php">Users</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="drivers.php">Drivers</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">EMT</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Ambulance</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Dispatch</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Emergency Requests</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Feedback</a>
        </li>
        <li class="nav-item mt-4 rounded-start-pill  ps-3 text-white fw-semibold fs-5 ">
          <a class="nav-link active" aria-current="page" href="Ambulance.php">Medical Profiles</a>
        </li>
        <li class="mt-4 text-light ps-3 fw-semibold fs-5 d-flex">
          <img class="" src="../admin_image/logout.png" alt="">
          <a class="nav-link" href="registration_system/logout.php">Logout</a>
        </li>
        <br>
        </ul>


            

          
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 text-center mt-3">
        
        <form style="padding: 30px;background:#b71c1c;" class="rounded-4" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
          <div class="row text-start">
            <div class="col-6">
            <div class="input-field">  
            <input type="text" name="vehicleNumber" required spellcheck="false" >
              <label class="text-white">Vehicle Number</label>
              </div>
            </div>

            <div class="col-6">
            <div class="input-field">  
            <select name="equipmentLevel">
                <option hidden>Select Equipment Level</option>
                <option class="text-black fs-6" value="Basic">Basic</option>
                <option class="text-black fs-6" value="Advance">Advance</option>
            </select>
            </div>
            </div>
          </div>
          <br>

          <br>

          <div class="row text-start">
            <div class="col-12">

            <select name="currentStatus">
                <option hidden>Select Current Status</option>
                <option class="text-black fs-6" value="Available">Available</option> 
                <option class="text-black fs-6" value="On Call">On Call</option>
                <option class="text-black fs-6" value="Maintenance">Maintenance</option>
            </select>
            </div>
          </div>

          <br>
            <!-- image -->
          <div class="row text-start">
            <div class="col-12">
            <div class="input-field">
            <h5 class="text-white">Vehicle Image</h5><input type="file" name="ambimage" required>
      </div>
            </div>
          </div>

          <br>

          <div class="row">
          <div class="col-12">
            <input style="background-color: #d18989;" class="btn btn-sm px-3 text-white fw-bold fs-5 w-100 border border-white border-1" name="create" type="submit" value="Create">
          </div>
          </div>

        </form>
        <br>
        <!-- Data Display In table Start-->
        <div class="table-responsive">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Vehicle Number</th>
                  <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Equipment Level</th>
                  <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Current Status</th>
                  <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Vehicle Image</th>
                  <th style="background-color: #b71c1c;color: white;" class="border-bottom-5 border-danger">Action</th>
                </tr>
              </thead>

            
              <tbody>
              <?php
                $queryRead = "SELECT * FROM ambulances";
                $queryRun = mysqli_query($con , $queryRead);
                if (mysqli_num_rows($queryRun)) {
                    while ($row = mysqli_fetch_array($queryRun)) {
            ?>
                    <tr>
                    <td class="border-bottom-5"><?php echo $row['vehicle_number']?></td>
                    <td class="border-bottom-5"><?php echo $row['equipment_level']?></td>
                    <td class="border-bottom-5"><?php echo $row['current_status']?></td>
                    <td><img src="<?php echo "images/" . $row['amb_image'] ?>" width="50" height="50" alt=""></td>
                    <td class="border-bottom-5">
                    <a class="btn btn-primary btm-lg border border-white border-1 px-3 w-100" href="AmbulanceEdit.php?id=<?php echo $row['ambulanceid']; ?>">Edit</a>
                    <br>
                    <a class="btn btn-danger btm-lg border border-white border-1 px-3 w-100" href="AmbulanceDelete.php?id=<?php echo $row['ambulanceid']; ?>">Delete</a> </td>
                  </tr>
            <?php
                    }
                }
            ?>
                  
              </tbody>
          </table>
        </div>
        <!-- Data Display In table End-->
        
        </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>