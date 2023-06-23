<?php
// delete.php

require("conection.php");

// Retrieve the SSN parameter from the URL
$ssn = $_GET['DoctorSsn'];

// Perform the delete query based on the retrieved SSN
$query = "DELETE FROM doctor WHERE DoctorSsn='$ssn'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Delete successful, redirect back to the main page or display a success message
    header("Location: indexpage.php"); // Replace "index.php" with your main page
    exit();
} else {
    // Handle the case where the delete failed
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
