<?php
include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Fetch the driver details
    $query = "SELECT * FROM drivers WHERE driverid = '$id'";
    $run = mysqli_query($con, $query);
    $driver = mysqli_fetch_array($run);
    
    if(isset($_POST['update_driver'])){
        $driverName = $_POST['driverName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['driverEmail'];

        if(!empty($_POST['driverPassword'])){
            $password = password_hash($_POST['driverPassword'], PASSWORD_BCRYPT);
            $passwordQuery = ", d_password = '$password'";
        } else {
            $passwordQuery = "";
        }

        if($_FILES['driverImage']['name']){
            $imagename = $_FILES['driverImage']['name'];
            $imgpath = $_FILES['driverImage']['tmp_name'];
            move_uploaded_file($imgpath, 'images/'.$imagename);
            $imageQuery = ", d_image = '$imagename'";
        } else {
            $imageQuery = "";
        }

        $updateQuery = "UPDATE drivers SET D_name = '$driverName', phonenumber = '$phoneNumber', d_email = '$email' $passwordQuery $imageQuery WHERE driverid = '$id'";
        $runUpdate = mysqli_query($con, $updateQuery);

        if($runUpdate){
            echo "<script>
                    alert('Driver Information Updated');
                    window.location.href='drivers.php';
                  </script>";
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Drivers</title>
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
                            <input type="text" name="driverName" value="<?php echo $driver['D_name']; ?>" required>
                            <label class="text-white">Driver Name</label>
                        </div>
            </div>

            <div class="col-6">
                <div class="input-field">  
                <div class="input-field">  
                            <input type="text" name="phoneNumber" value="<?php echo $driver['phonenumber']; ?>" required>
                            <label class="text-white">Phone Number</label>
                        </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row text-start">
            <div class="col-12">
            <div class="input-field">  
                            <input type="email" name="driverEmail" value="<?php echo $driver['d_email']; ?>" required>
                            <label class="text-white">Email</label>
                        </div>
            </div>
        </div>

        <br>
        <div class="row text-start">
            <div class="col-12">
            <div class="input-field">  
                            <input type="password" name="driverPassword" placeholder="Leave blank if not changing">
                            <label class="text-white">Password</label>
                        </div>
      </div>
      <br>
      <div class="row text-start">
                    <div class="col-12">
                        <h5 class="text-white">Driver Image</h5>
                        <input type="file" name="driverImage">
                        <img src="images/<?php echo $driver['d_image']; ?>" width="100" alt="Driver Image">
                    </div>
                </div>
                <br><br>
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
