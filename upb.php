<?php
include 'connection/dbcon.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['id'];

    $bname=$_POST['bname'];
    $bcity=$_POST['bcity'];
    $tire=$_POST['tire'];

    $sql="UPDATE `bank` SET `Bname` = '$bname' WHERE `bank`.`BankID` = $id";
    $result=mysqli_query($conn,$sql);

    $sql="UPDATE `bank` SET `Bcity` = '$bcity' WHERE `bank`.`BankID` = $id";
    $result=mysqli_query($conn,$sql);

    $sql="UPDATE `bank` SET `bank_tire` = '$tire' WHERE `bank`.`BankID` = $id";
    $result=mysqli_query($conn,$sql);


}

header("location: table.php");

?>