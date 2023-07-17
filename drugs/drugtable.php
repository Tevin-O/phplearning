<?php 
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

$query = "SELECT * FROM drugs";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From DataBase In Php </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch Data From DataBase In Php</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Drug Name</td>
                                <td>Formula</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Company Name</td>
                                <td>Manufacture Date</td>
                                <td>Expiry Date</td>
                                <td>Actions</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['Drug_Name']; ?></td>
                                    <td><?php echo $row['formula']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['Quantity']; ?></td>
                                    <td><?php echo $row['Company_Name']; ?></td>
                                    <td><?php echo $row['Manufacture_Date']; ?></td>
                                    <td><?php echo $row['Expiry_Date']; ?></td>
                                    <td>
                                        <a href="editdrugs.php?Drug_Name=<?php echo $row['Drug_Name']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="deleteddrugs.php?Drug_Name=<?php echo $row['Drug_Name']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
