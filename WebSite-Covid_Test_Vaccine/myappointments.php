<?php
include "registration_system/connection.php";
// $id = $_GET['myappointments'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>eVaccine</title>
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
        border-bottom: 1px solid #000000;
        background: transparent;
        color: #000000;
        outline: none;
        }
        .input-field label{
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #000000;
        font-size: 16px;
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

<body style="background-color: #07306E;">
 <?php
 include 'navbar.php';
 ?>
<div class="container my-5">
    <!-- Data Display In table Start-->
    <div class="row">
        <div class="col-lg-12">
          <h1 class="text-center text-white fw-bold">My Appointments</h1>
          <br>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Hospital Name</th>
                            <th>Vaccine Name</th>
                            <th>Booking Date</th>
                            <th>Booking Timing</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                  $queryRead = "SELECT vaccination_booking.* , patient.* , hospital.* , vaccine.* 
                  FROM vaccination_booking INNER JOIN patient ON vaccination_booking.p_id = patient.p_id 
                  INNER JOIN hospital ON vaccination_booking.h_id = hospital.h_id 
                  INNER JOIN vaccine ON vaccination_booking.v_id = vaccine.v_id 
                  WHERE patient.p_id = $_SESSION[patientid];";

                  $queryRun = mysqli_query($con , $queryRead);
                  if(mysqli_num_rows($queryRun)){
                    while ($row = mysqli_fetch_array($queryRun)) {
                ?>
                  <tr>
                    <td class="bg-transparent text-light"><?php echo $row['h_name']?></td>
                    <td class="bg-transparent text-light"><?php echo $row['v_name']?></td>
                    <td class="bg-transparent text-light"><?php echo $row['vb_date']?></td>
                    <td class="bg-transparent text-light"><?php echo $row['vb_timing']?></td>
                    <td class="bg-transparent text-light"><?php echo $row['vb_status']?></td>
                  </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
                </table>
            </div>
        </div>
    </div> 
    <!-- Data Display In table End-->
</div>    
 



<script src="js/bootstrap.bundle.js"></script>
</body>
</html>