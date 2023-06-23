<?php
// update.php
require("conection.php");
// Retrieve the form data

$ssn = $_POST['doctorid'];
$doctorName = $_POST['doctorname'];
$specialty = $_POST['doctorsspecialty'];
$yearsOfExperience = $_POST['yearsofexperience'];

// Perform the update query based on the retrieved form data
$query = "UPDATE doctor SET DoctorName='$doctorName', Specialty='$specialty', YearsOfExperience='$yearsOfExperience' WHERE DoctorSsn='$ssn'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Update successful, redirect back to the main page or display a success message
    header("Location: indexpage.php"); // Replace "index.php" with your main page
    echo "Welcome .$doctorName";
    exit();
} else {
    // Handle the case where the update failed
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
