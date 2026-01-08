<?php 

$server = "localhost"; //127.0.0.1:3306
$username ="root";
$password="";
$database ="emp";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    echo "Database connection Failed due to...".mysqli_connect_error();

    exit();
}

?>