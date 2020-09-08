<?php   
//  echo "nwdjkfjk";                                          //for db connection
if(isset($_POST['cname'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "products";

    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("connection feild" .
        mysqli_connect_error());
    }
    // echo $_POST['snoedit'];
    // echo $_GET['update'];
    // exit();
    // echo "succes connt db <br>";
    
    
                                                  //for inserting the data
                                                        
        $cname = $_POST['cname'];
        $sql = "INSERT INTO `products`.`productsdet` (`cname`) VALUES ('$cname')";
        
        // echo $sql;

        if($con->query($sql) == true){
            // echo "inserted";
        }
        else{
            echo"Error: $sql <br> $con->error";
        }
        
    
}
elseif(isset($_POST['cnameedit'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "products";

    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("connection feild" .
        mysqli_connect_error());
    }
    if(isset($_POST['snoedit'])){
        echo "yes";
        // console.log("yes");
        $cname = $_POST['cnameedit'];
        $sno = $_POST['snoedit'];
        echo $sno;
        $sql = "UPDATE `productsdet` SET `cname` = '$cname' WHERE `srno` = $sno;"; 
                // UPDATE `productsdet` SET `cname` = 'mobile2i122' WHERE `productsdet`.`srno` = 171; 
    // echo $sql;
        if($con->query($sql) == true){
            echo "inserted";
        }
        else{
            echo"Error: $sql <br> $con->error";
        }
    }
}
elseif(isset($_GET['delete']))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "products";

    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("connection feild" .
        mysqli_connect_error());
    }
    $sno = $_GET['delete'];
    echo $sno;
    $sql = "DELETE FROM `productsdet` WHERE `srno` = $sno";
    $result = mysqli_query($con,$sql);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);     
// exit();
?>
