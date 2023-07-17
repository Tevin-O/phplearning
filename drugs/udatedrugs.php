<?php
// update.php
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
// Retrieve the form data

$drug_name = $_POST['drugname'];
$formula = $_POST['formula'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$company_name = $_POST['companyname'];
$manufacture_date = $_POST['manufacturedate'];
$expiry_date = $_POST['expirydate'];

// Perform the update query based on the retrieved form data
$query = "UPDATE drugs SET Drug_Name='$drug_name', formula='$formula', price='$price', Quantity='$quantity',Company_Name='$company_name' Manufacture_Date='$manufacture_date' Expiry_Date='$expiry_date'  WHERE Drug_Name='$drug_name'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Update successful, redirect back to the main page or display a success message
    header("Location: ../indexpage.php"); // Replace "index.php" with your main page
   // echo "Welcome .$doctorName";
    exit();
} else {
    // Handle the case where the update failed
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>