<?php
include "connection.php";
include "registration_system/signinsession.php";

if(!isset($_SESSION['userid'])){
    header('location:login_register.php');
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Prepare and execute the delete query
    $query = "DELETE FROM drivers WHERE driverid = '$id'";
    $run = mysqli_query($con, $query);

    if($run){
        echo "
            <script>
                alert('Driver information deleted successfully.');
                window.location.href='drivers.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to delete Driver information.');
                window.location.href='drivers.php';
            </script>
        ";
    }
} else {
    header('location:drivers.php');
}
?>
