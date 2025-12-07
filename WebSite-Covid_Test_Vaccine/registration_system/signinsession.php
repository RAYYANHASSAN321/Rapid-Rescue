<?php
include "connection.php";
session_start();
// session_destroy();
if (isset($_SESSION["userid"]) || isset($_SESSION["username"])) {
  $uid = $_SESSION['userid'];
  $uname = $_SESSION['username'];

  $query = "SELECT * FROM users WHERE u_id = '$uid' AND u_name = '$uname'";
  $run = mysqli_query($con, $query);

  if (mysqli_num_rows($run) == 0) {
    session_destroy();
  }
}

if (isset($_SESSION['userid'])) {
  $id = $_SESSION['userid'];
  $myquery = "SELECT * FROM users WHERE u_id = $id";
  $run1 = mysqli_query($con, $myquery);
  $row1 = mysqli_fetch_array($run1);

  $userName = $row1['u_name'];
}

// else{
//     header('location:signin.php');
// }
