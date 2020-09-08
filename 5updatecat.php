<?php
if (isset($_POST['submit'])){
    $srno = $_POST['srno'];
    $cname = $_POST['cname'];
    if (empty($cname)){
        $cnameerr = "*required";
        return $cnameerr;
    }
    elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$cname))
    {
        $cnameerr = "*not allowed special characters ";
    }
    elseif (preg_match('/[0-9]/',$cname))
        {
            $cnameerr = "*not allowed number";
        }   
    else{   
        // $srno = $_POST['srno'];
        // $cname = $_POST['cname'];
        // echo $cname;
        // echo $srno;
        include("con.php");
        $sql="UPDATE `productsdet` SET `cname` = '$cname' WHERE `srno` = $srno;";
        $result=mysqli_query($con,$sql);
    }
}
header("Location: 3displaycat.php");     
?>