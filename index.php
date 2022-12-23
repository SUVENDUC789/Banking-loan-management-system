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
        <h3 class="text-center alert alert-danger">Cutomer details</h3>
<?php
include 'connection/dbcon.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $cname=$_POST['cname'];
    $age=$_POST['age'];
    $ctype=$_POST['ctype'];

    $sql="INSERT INTO `customer` (`Cust_ID`, `Cname`, `Age`, `Cust_type`) VALUES (NULL, '$cname', '$age', '$ctype')";
    $result=mysqli_query($conn,$sql);

    $sql="SELECT * FROM `customer` WHERE Cname='$cname' AND Age=$age AND Cust_type='$ctype'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Insert data successfully | Your id is : '.$row['Cust_ID'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}

?>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="cs" class="form-label"><b>Customer Name</b></label>
                <input type="text" name="cname" class="form-control" id="cs" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="csNumber" class="form-label"><b>Age</b></label>
                <input type="number" name="age" class="form-control" id="csNumber" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <p><b>Customer type</b></p>
                <select class="form-select" name="ctype" aria-label="Default select example">
                    <option value="Regular">Regular</option>
                    <option value="Priority">Priority</option>
                    <option value="Corporate" selected>Corporate</option>
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