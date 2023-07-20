<?php
// editprescription.php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the record based on the PrescriptionId parameter
$prescription_id = $_GET['PrescriptionId'];

// Retrieve the record from the database
$query = "SELECT * FROM prescriptions WHERE PrescriptionId = '$prescription_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Record found, retrieve the data
    $row = mysqli_fetch_assoc($result);
    $prescription_id = $row['PrescriptionId'];
    $description = $row['Description'];
    $patient_name = $row['PatientName'];
    $doctor_name = $row['DoctorName'];
    $drug_name = $row['Drug_Name'];
} else {
    // Handle the case where the record was not found
    echo "Record not found.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prescription</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Prescription</h2>
        <form action="updateprescriptions.php" method="POST">
            <input type="hidden" name="prescriptionid" value="<?php echo $prescription_id; ?>">
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>">
            </div>
            <div class="form-group">
                <label for="patientname">Patient Name:</label>
                <input type="text" class="form-control" id="patientname" name="patientname" value="<?php echo $patient_name; ?>">
            </div>
            <div class="form-group">
                <label for="doctorname">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorname" name="doctorname" value="<?php echo $doctor_name; ?>">
            </div>
            <div class="form-group">
                <label for="drugname">Drug Name:</label>
                <input type="text" class="form-control" id="drugname" name="drugname" value="<?php echo $drug_name; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
