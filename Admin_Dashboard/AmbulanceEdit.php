<?php
include "connection.php";
include "registration_system/signinsession.php";

if(!isset($_SESSION['userid'])){
    header('location:login_register.php');
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM ambulances WHERE ambulanceid = '$id'";
    $result = mysqli_query($con, $query);
    $ambulance = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])){
    $vehicleNumber = $_POST['vehicleNumber'];
    $equipmentLevel = $_POST['equipmentLevel'];
    $status = $_POST['currentStatus'];
    
    $imagename = $_FILES['ambimage']['name'];
    $imgpath = $_FILES['ambimage']['tmp_name'];

    
  move_uploaded_file($imgpath, 'images/'.$imagename);

    $query = "UPDATE ambulances SET vehicle_number = '$vehicleNumber', equipment_level = '$equipmentLevel', current_status = '$status' ,amb_image = '$imagename' WHERE ambulanceid = '$id'";
    $run = mysqli_query($con , $query);

    if($run){
        echo "
            <script>
                alert('Ambulance Information Updated');
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
    <title>Edit Ambulance</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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

    <div class="container mt-5">
        <form style="padding: 30px;background:#b71c1c;" class="rounded-4" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <a style="float: right;" class="btn btn-danger btm-lg border border-white border-0 shadow px-5 " href="Ambulance.php">Back To Dashboard</a></td>
        <div class="d-flex">
        <h1 class="text-white">Edit Ambulance</h1>
        </div>
        <br><br>
        <div class="row text-start">
            <div class="col-6">
                <div class="input-field">  
                    <input type="text" name="vehicleNumber" value="<?php echo $ambulance['vehicle_number']; ?>" required spellcheck="false">
                    <label class="text-white">Vehicle Number</label>
                </div>
            </div>

            <div class="col-6">
                <div class="input-field">  
                    <select name="equipmentLevel">
                        <option hidden>Select Equipment Level</option>
                        <option class="text-black fs-6" value="Basic" <?php if($ambulance['equipment_level'] == 'Basic') echo 'selected'; ?>>Basic</option>
                        <option class="text-black fs-6" value="Advance" <?php if($ambulance['equipment_level'] == 'Advance') echo 'selected'; ?>>Advance</option>
                    </select>
                </div>
            </div>
        </div>
        <br>

        <div class="row text-start">
            <div class="col-12">
                <select name="currentStatus">
                    <option hidden>Select Current Status</option>
                    <option class="text-black fs-6" value="Available" <?php if($ambulance['current_status'] == 'Available') echo 'selected'; ?>>Available</option>
                    <option class="text-black fs-6" value="On Call" <?php if($ambulance['current_status'] == 'On Call') echo 'selected'; ?>>On Call</option>
                    <option class="text-black fs-6" value="Maintenance" <?php if($ambulance['current_status'] == 'Maintenance') echo 'selected'; ?>>Maintenance</option>
                </select>
            </div>
        </div>

        <br>
        <div class="row text-start">
            <div class="col-12">
            <div class="input-field">
            <h5 class="text-white">Vehicle Image</h5><input type="file" name="ambimage">
      </div>
      <br>

        <div class="row">
            <div class="col-12">
                <input style="background-color: #d18989;" class="btn btn-sm px-3 text-white fw-bold fs-5 w-100 border border-white border-1" name="update" type="submit" value="Update">
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
