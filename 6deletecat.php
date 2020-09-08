<?php
$srno = $_GET['srno'];
// echo $srno;
include("con.php");
$sql = "DELETE FROM `productsdet` WHERE `srno` = $srno";
$result=mysqli_query($con,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>