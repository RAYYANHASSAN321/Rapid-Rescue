<?php
include "registration_system/connection.php";

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

<body>
 <?php
 include 'navbar.php';
 ?>

<div class="container my-5">


    <div class="row">
        <?php
        $query = "SELECT * FROM hospital WHERE h_status = 'Approved';";
        $run = mysqli_query($con , $query);
        if(mysqli_num_rows($run)){
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 mt-lg-0 mt-sm-5">
                    <div class="bg-primary-subtle rounded-3 text-center ">
                    
                        
                        <img style="height:250px;" src="<?php echo "../hospital_images/".$row['h_image']?>" class=" rounded-bottom-5 img-fluid" width="100%" alt="...">
                        <br><br>
                        
                        <div class="fourthDiv text-center">
                            <a class="headingsDepartment fs-5" href="#"><?php echo $row['h_name']?></a>
                            <br>
                            <br>
                            
                            <a class="readmoreBtn btn btn-primary btn-sm w-50" href="view_hospital.php?view=<?php echo $row['h_id']?>">View Hospital</a>
                            <br><br>
                        </div>
                    </div>
                    <br><br>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>

<script src="js/bootstrap.bundle.js"></script>
</body>
</html>