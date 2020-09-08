<?php
$id = $_GET['id'];
echo $id;
include("con.php");
$sql="DELETE FROM `productsdet1` WHERE `id` = $id";
$sql=mysqli_query($con,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>