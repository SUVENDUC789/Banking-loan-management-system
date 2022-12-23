<?php
include 'connection/dbcon.php';

try {
    $id=$_GET['id'];
    $sql="SELECT * FROM `customer` WHERE Cust_ID=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    $name=$row['Cname'];
    $Age=$row['Age'];
    $Cust_type=$row['Cust_type'];
    //code...
} catch (\Throwable $th) {
    //throw $th;
}

// }
// echo $id;
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
        <h3 class="text-center alert alert-danger">Update now ~ Cutomer details</h3>

        <form action="upcus.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="cs" class="form-label"><b>Customer Name</b></label>
                <input type="text" name="cname" value="<?php echo $name; ?>" class="form-control" id="cs" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <label for="csNumber" class="form-label"><b>Age</b></label>
                <input type="number" name="age" value="<?php echo $Age; ?>" class="form-control" id="csNumber" aria-describedby="text" required>
            </div>
            <div class="mb-3">
                <p><b>Customer type</b></p>
                <p><i><?php echo $Cust_type; ?></i></p>
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