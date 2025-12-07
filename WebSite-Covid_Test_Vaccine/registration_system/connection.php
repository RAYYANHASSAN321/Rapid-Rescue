<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'rapid_rescue_db';

$con = mysqli_connect($server , $username , $password , $database);
if(!$con){
    echo "Database connection failed due to ".mysqli_connect_error($con);
}
?>