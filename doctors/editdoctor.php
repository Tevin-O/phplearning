<?php
// edit.php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the SSN parameter from the URL
$ssn = $_GET['DoctorSsn'];

// Retrieve the record based on the provided SSN
$query = "SELECT * FROM doctor WHERE DoctorSsn='$ssn'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Record found, retrieve the data
    $row = mysqli_fetch_assoc($result);
    $doctorName = $row['DoctorName'];
    $specialty = $row['Specialty'];
    $yearsOfExperience = $row['YearsOfExperience'];
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
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Doctor</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="doctorid" value="<?php echo $ssn; ?>">
            <div class="form-group">
                <label for="doctorName">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorName" name="doctorname" value="<?php echo $doctorName; ?>">
            </div>
            <div class="form-group">
                <label for="specialty">Specialty:</label>
                <input type="text" class="form-control" id="specialty" name="doctorsspecialty" value="<?php echo $specialty; ?>">
            </div>
            <div class="form-group">
                <label for="yearsOfExperience">Years of Experience:</label>
                <input type="text" class="form-control" id="yearsOfExperience" name="yearsofexperience" value="<?php echo $yearsOfExperience; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
