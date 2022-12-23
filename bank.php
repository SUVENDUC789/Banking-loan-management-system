<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bank Form</title>
</head>

<body>

    <?php include 'other/_nav.php';?>

    <div class="container my-3">
        <h3 class="text-center alert alert-info">Bank details</h3>
<?php
include 'connection/dbcon.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $bname=$_POST['bname'];
    $bcity=$_POST['bcity'];
    $tire=$_POST['tire'];

    $sql="INSERT INTO `bank` (`BankID`, `Bname`, `Bcity`, `bank_tire`) VALUES (NULL, '$bname', '$bcity', '$tire')";
    $result=mysqli_query($conn,$sql);

    $sql="SELECT * FROM `bank` WHERE Bname='$bname' AND Bcity='$bcity' AND bank_tire='$tire'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Insert data successfully | Bank id is : '.$row['BankID'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}

?>
        <form action="bank.php" method="post">
            <div class="mb-3">
                <label for="bn" class="form-label"><b>Bank Name</b></label>
                <input type="text" name="bname" class="form-control" id="bn" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="bnCity" class="form-label"><b>Bank City</b></label>
                <input type="text" name="bcity" class="form-control" id="bnCity" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <p><b>Bank tire</b></p>
                <select class="form-select" name="tire" aria-label="Default select example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>