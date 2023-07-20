<?php 
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

$query = "SELECT * FROM prescriptions";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From Database In Php</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch Data From Database In Php</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Prescription ID</td>
                                <td>Description</td>
                                <td>Patient Name</td>
                                <td>Doctor Name</td>
                                <td>Drug Name</td>
                                <td>Actions</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['PrescriptionId']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo $row['PatientName']; ?></td>
                                    <td><?php echo $row['DoctorName']; ?></td>
                                    <td><?php echo $row['Drug_Name']; ?></td>
                                    <td>
                                        <a href="editprescriptions.php?PrescriptionId=<?php echo $row['PrescriptionId']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="deleteprescriptions.php?PrescriptionId=<?php echo $row['PrescriptionId']; ?>" class="btn btn-danger">Delete</a>
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
