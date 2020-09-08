<?php

if (isset($_POST['submit'])){
    include("con.php");         //for database connect
    $id= $_POST['id'];
    $pname =$_POST['pname'];
    $pprice =$_POST['pprice'];
    $file=$_FILES['file'];
    $scategory =$_POST['scategory'];
    $fileerror =$_FILES['file']['error'];
    // echo $fileerror;
    // echo $id;
     echo $pname;
     echo $pprice;
     echo $scategory;
     print_r($file);
     
    
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
    // echo $fileext; 
    // echo $fileactualext;

    $allowed = array('jpg','jpeg','png');

    if($fileerror === 4){
        $sql = "UPDATE `productsdet1` SET `pname` = '$pname', `pprice` = '$pprice', `scategory` = '$scategory' WHERE `id` = $id;";
        if($con->query($sql) == true){
            // echo "inserted";
             header("Location: display.php");    
         }
         else{
             echo"Error: $sql <br> $con->error";
         }      
    }
    elseif (in_array($fileactualext,$allowed)){
        if($fileerror === 0){
            if($filesize < 1000000){
                // $filenamenew = uniqid('',true).".".$fileactualext;
                // $filedestination='upload/'.$filenamenew;
                // move_uploaded_file($filetname,$filedestination);
                // header("location: index.php?uploadsuccess");
                // echo "aksh";        
                                                                  //for inserting the data    
                $sql = "UPDATE `productsdet1` SET `pname` = '$pname', `pprice` = '$pprice', `file` = '$folder', `scategory` = '$scategory' WHERE `id` = $id;";                                                                                      
                // $sql = "INSERT INTO `products`.`productsdet1` (`pname`, `pprice`, `file`, `scategory`) VALUES ('$pname', '$pprice', '$folder', '$scategory')";
                 // echo $sql;
         
                 if($con->query($sql) == true){
                    // echo "inserted";
                    header("Location: display.php");    
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
}

?>