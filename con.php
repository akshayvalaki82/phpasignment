<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "products1";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die("connection feild" .
    mysqli_connect_error());
}
//   echo "succes connt db";
?>