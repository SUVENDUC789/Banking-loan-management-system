<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Loan Form</title>
</head>

<body>

    <?php include 'other/_nav.php';?>

    <div class="container my-3">
        <h3 class="text-center alert alert-warning">Loan Apply</h3>
<?php
include 'connection/dbcon.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    try {
        $cid=$_POST['cid'];
        $bankid=$_POST['bankid'];
        $ammount=$_POST['ammount'];
        $emi=$_POST['emi'];
    
        $sql="INSERT INTO `loan` (`LoanID`, `Cust_ID`, `BankID`, `Amount`, `No_of_emi_type`) VALUES (NULL, '$cid', '$bankid', '$ammount', '$emi')";
        $result=mysqli_query($conn,$sql);
    
        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Insert data successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    } catch (\Throwable $th) {

        if($th->getCode()){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert !</strong> Please write correct Bank id and Customer Id
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        // else{
        //     echo $th->getCode();
        // }
    }
}

?>
        <form action="loanForm.php" method="post">
            <div class="mb-3">
                <label for="csid" class="form-label"><b>Customer ID</b></label>
                <input type="number" name="cid" class="form-control" id="csid" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="bankid" class="form-label"><b>Bank ID</b></label>
                <input type="number" name="bankid" class="form-control" id="bankid" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="ammount" class="form-label"><b>Ammount</b></label>
                <input type="number" name="ammount" class="form-control" id="ammount" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <p><b>Emi Type</b></p>
                <select class="form-select" name="emi" aria-label="Default select example">
                    <option value="Car" selected>Car</option>
                    <option value="Home">Home</option>
                    <option value="Education">Education</option>
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