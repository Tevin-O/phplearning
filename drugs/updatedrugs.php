<?php
// updatedrugs.php
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the form data
$drug_name = $_POST['drugname'];
$formula = $_POST['formula'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$company_name = $_POST['companyname'];
$manufacture_date = $_POST['manufacturedate'];
$expiry_date = $_POST['expirydate'];

// Establish database connection


// Perform the update query based on the retrieved form data
$query = "UPDATE drugs SET formula=?, price=?, Quantity=?, Company_Name=?, Manufacture_Date=?, Expiry_Date=? WHERE Drug_Name=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssss", $formula, $price, $quantity, $company_name, $manufacture_date, $expiry_date, $drug_name);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Update successful, redirect back to the main page or display a success message
    header("Location: drugtable.php"); // Replace "indexpage.php" with your main page
    exit();
} else {
    // Handle the case where the update failed
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

