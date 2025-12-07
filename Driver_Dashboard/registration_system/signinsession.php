<?php
include "connection.php";
session_start();
// session_destroy();

if(isset($_SESSION['driver_id'])){
    $id = $_SESSION['driver_id'];
    $myquery = "SELECT * FROM drivers WHERE driverid = $id";
    $runnnnn = mysqli_query($con , $myquery);
    $rowwwws = mysqli_fetch_array($runnnnn);

    $userName = $rowwwws['D_name'];

  }

  // else{
  //     header('location:signin.php');
  // }


?>