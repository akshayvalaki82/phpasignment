<?php

if (isset($_POST['submit'])){
    include("con.php");         //for database connect

    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $file = $_FILES['file'];
    $scategory = $_POST['scategory'];                                
    print_r($file);
    // echo $pname;
    // echo $pprice;
    // echo $scategory;

    $filename =$_FILES['file']['name'];
    $filetname =$_FILES['file']['tmp_name'];
    $folder = "uploads/".$filename;
    // echo $folder;
    // echo $filetname;
    move_uploaded_file($filetname,$folder);
    $filesize =$_FILES['file']['size'];
    $fileerror =$_FILES['file']['error'];
    $filetype =$_FILES['file']['type'];

    $fileext = explode('.',$filename);
    $fileactualext = strtolower(end($fileext));
    // echo $fileactualext;

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileactualext,$allowed)){
        if($fileerror === 0){
            if($filesize < 1000000){
                // $filenamenew = uniqid('',true).".".$fileactualext;
                // $filedestination='upload/'.$filenamenew;
                // move_uploaded_file($filetname,$filedestination);
                // header("location: index.php?uploadsuccess");
                // echo "aksh";        
                                                                  //for inserting the data                        
                $sql = "INSERT INTO `products1`.`productsdet1` (`pname`, `pprice`, `file`, `scategory`) VALUES ('$pname', '$pprice', '$folder', '$scategory')";
                 // echo $sql;
         
                 if($con->query($sql) == true){
                    // echo "inserted";
                 }
                 else{
                     echo"Error: $sql <br> $con->error";
                 }
                

            }
            else{
                echo "file is to big";
            }

        }
        else{
            echo "errorin file";
        }

    }
    else{
        echo "you can not uplod file else";
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);     
?>