<?php
include 'connection/dbcon.php';

// if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];
    // echo $id;
    $sql="SELECT * FROM `bank` WHERE BankID=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
// }
?>

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
        <h3 class="text-center alert alert-info">Update now ~ Bank details</h3>

        <form action="upb.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="bn" class="form-label"><b>Bank Name</b></label>
                <input type="text" name="bname" value="<?php echo $row['Bname']; ?>" class="form-control" id="bn" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="bnCity" class="form-label"><b>Bank City</b></label>
                <input type="text" name="bcity" value="<?php echo $row['Bcity']; ?>" class="form-control" id="bnCity" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <p><b>Bank tire</b></p>
                <p><i><?php echo $row['bank_tire']; ?></i></p>
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