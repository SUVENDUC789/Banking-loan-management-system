<?php
include 'connection/dbcon.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['id'];
    $cname=$_POST['cname'];
    $age=$_POST['age'];
    $ctype=$_POST['ctype'];

    $sql="UPDATE `customer` SET `Cname` = '$cname' WHERE `customer`.`Cust_ID` = $id";
    $result=mysqli_query($conn,$sql);

    $sql="UPDATE `customer` SET `Age` = '$age' WHERE `customer`.`Cust_ID` = $id";
    $result=mysqli_query($conn,$sql);

    $sql="UPDATE `customer` SET `Cust_type` = '$ctype' WHERE `customer`.`Cust_ID` = $id";
    $result=mysqli_query($conn,$sql);


    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Update data success fully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    header("location: table.php");

}

?>