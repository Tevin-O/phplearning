<?php
// deleteprescription.php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the PrescriptionId parameter from the URL
$prescription_id = $_GET['PrescriptionId'];

// Perform the delete query based on the retrieved PrescriptionId
$query = "DELETE FROM prescriptions WHERE PrescriptionId=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $prescription_id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Delete successful, redirect back to the main page or display a success message
    header("Location: prescriptiontable.php"); // Replace "indexpage.php" with your main page
    exit();
} else {
    // Handle the case where the delete failed
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
