<?php
include "registration_system/connection.php";
$viewId = $_GET['view'];
$query = "SELECT * FROM hospital WHERE h_id = $viewId;";
$run = mysqli_query($con , $query);
$row = mysqli_fetch_array($run); 

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

<body style="background-color: #f0f7fc;">
 <?php
 include 'navbar.php';
 ?>

<div class="container-fluid my-5">
    <div class="container">
        <div class="row gap-5">
            <div class="col-lg-5 mt-5 mt-sm-0">
            <img src="<?php echo "../hospital_images/".$row['h_image']?>" class=" rounded-3" width="100%" alt="...">
            </div>
            <div class="col-lg-6 mt-lg-5 mt-sm-0 text-center">
                <a class="headingsDepartment fs-2"><?php echo $row['h_name']?></a>
                <br>
                <div class="my-lg-5 my-sm-0 bg-primary-subtle text-start">
                    <h4 class="text-bg-dark bg-primary-subtle p-2 fs-5 fw-bold mt-4" data-bs-theme="dark">Hospital Details</h4>
                    <div class="div ps-3">
                        <a class="headingsDepartment fw-semibold fs-6"><span class="fw-bold fs-6">Hospital Contact : </span><?php echo $row['h_contact']?></a>
                        <br><br>
                        <a class="headingsDepartment fw-semibold fs-6"><span class="fw-bold fs-6">Hospital Email : </span><?php echo $row['h_email']?></a>
                        <br>
                    </div>
                    <a class="btn btn-primary border-opacity-25 fw-bold mt-4 w-100" href="booking.php?booking=<?php echo $row['h_id']?>">Vaccination Booking</a>
                </div>
            </div>
        </div>
        <div class="row"> 
                <!-- Data Display In table Start-->
            <div class="col-lg-12 table-responsive mt-lg-5">
                <!-- <h3 class="fw-bold text-primary-emphasis mt-5 text-center">Availible Vaccines</h3> -->
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th style="background-color: #07306E;color: white;" class="border-bottom-5 border-primary">Availible Vaccines</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        $queryRead = "SELECT vaccine.* , hospital.* FROM vaccine INNER JOIN hospital ON vaccine.h_id = hospital.h_id WHERE hospital.h_id = $viewId AND v_status = 'Availible';";
                        $queryRun = mysqli_query($con , $queryRead);
                        if(mysqli_num_rows($queryRun)){
                            while ($row = mysqli_fetch_array($queryRun)) {
                        ?>
                        <tr>
                            <td class="bg-transparent"><?php echo $row['v_name']?></td>  
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

<?php
include "footer.php";
?>

<script src="js/bootstrap.bundle.js"></script>
</body>
</html>