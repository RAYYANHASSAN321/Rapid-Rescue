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
    $query = "DELETE FROM ambulances WHERE ambulanceid = '$id'";
    $run = mysqli_query($con, $query);

    if($run){
        echo "
            <script>
                alert('Ambulance information deleted successfully.');
                window.location.href='Ambulance.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to delete ambulance information.');
                window.location.href='Ambulance.php';
            </script>
        ";
    }
} else {
    header('location:Ambulance.php');
}
?>
