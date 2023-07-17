<?php
// delete.php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the Drug_Name parameter from the URL
$drug_name = $_GET['Drug_Name'];

// Perform the delete query based on the retrieved Drug_Name
$query = "DELETE FROM drugs WHERE Drug_Name=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $drug_name);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Delete successful, redirect back to the main page or display a success message
    header("Location: drugtable.php"); // Replace "indexpage.php" with your main page
    exit();
} else {
    // Handle the case where the delete failed
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

