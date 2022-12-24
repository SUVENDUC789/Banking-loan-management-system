<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#myTable2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#myTable3').DataTable();
        });
    </script>

    <title>Bank Form details table </title>
</head>

<body>

    <?php include 'other/_nav.php';?>

    <div class="container my-3">
        <h1 class="text-center alert alert-info">Customer details Table</h1>
        <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th scope="col">Customer Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Age</th>
                <th scope="col">Customer Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
<?php
include 'connection/dbcon.php';

$sql="SELECT * FROM `customer`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
// echo $num;

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_assoc($result);

    echo '<tr>
    <th scope="row">'.$row['Cust_ID'].'</th>
    <td>'.$row['Cname'].'</td>
    <td>'.$row['Age'].'</td>
    <td>'.$row['Cust_type'].'</td>
    <td><a href="updatecus.php?id='.$row['Cust_ID'].'" class="btn btn-primary">Update</a></td>
  </tr>';
}
?>
            
         </tbody>
          </table>
    </div>


    <div class="container my-3">
        <h1 class="text-center alert alert-success">Bank details Table</h1>
        <table class="table table-striped" id="myTable2">
            <thead>
              <tr>
                <th scope="col">Bank ID</th>
                <th scope="col">Bank Name</th>
                <th scope="col">Bank City</th>
                <th scope="col">Bank Tire</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
<?php
include 'connection/dbcon.php';

$sql="SELECT * FROM `bank`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
// echo $num;

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_assoc($result);

    echo '<tr>
    <th scope="row">'.$row['BankID'].'</th>
    <td>'.$row['Bname'].'</td>
    <td>'.$row['Bcity'].'</td>
    <td>'.$row['bank_tire'].'</td>
    <td><a href="updatebank.php?id='.$row['BankID'].'" class="btn btn-warning">Update</a></td>
  </tr>';
}
?>
              
         </tbody>
          </table>
    </div>


    <div class="container my-3">
        <h1 class="text-center alert alert-danger">Loan details Table</h1>
        <table class="table table-striped" id="myTable3">
            <thead>
              <tr>
                <th scope="col">Loan ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Emi type</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Age</th>
                <th scope="col">Customer Type</th>
                <th scope="col">Bank Name</th>
                <th scope="col">Bank City</th>
                <th scope="col">Bank Tire</th>
              </tr>
            </thead>

            <tbody>
<?php
include 'connection/dbcon.php';

$sql="SELECT * FROM `loan` INNER JOIN `customer` ON `loan`.`Cust_ID`=`customer`.`Cust_ID` INNER JOIN `bank` ON `loan`.`BankID`=`bank`.`BankID`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
// echo $num;

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_assoc($result);

    echo '<tr>
    <th scope="row">'.$row['LoanID'].'</th>
    <td>'.$row['Amount'].'</td>
    <td>'.$row['No_of_emi_type'].'</td>
    <td>'.$row['Cname'].'</td>
    <td>'.$row['Age'].'</td>
    <td>'.$row['Cust_type'].'</td>
    <td>'.$row['Bname'].'</td>
    <td>'.$row['Bcity'].'</td>
    <td>'.$row['bank_tire'].'</td>
    </tr>';
  }
  ?>
  <!-- <td><a href="updatebank.php?id='.$row['BankID'].'" class="btn btn-warning">Update</a></td> -->
              
         </tbody>
          </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>