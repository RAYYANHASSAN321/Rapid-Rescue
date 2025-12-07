<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'rapid_rescue_db';

$con = mysqli_connect($server , $username , $password , $database);

if(!$con){
    echo "Database connection failed due to connection error".mysqli_connect_error($con);
}

?>