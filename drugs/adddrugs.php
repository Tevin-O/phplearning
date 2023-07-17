<?php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Establish database connection

// Post method takes input from user using PHP and places it in the database
$drug_name = $_POST['drugname'];
$formula = $_POST['formula'];
$price = $_POST['price'];
$quantity = $_POST['quantity']; 
$company_name = $_POST['companyname']; 
$manufacture_date = $_POST['manufacturedate']; 
$expiry_date = $_POST['expirydate']; 

if ($conn->connect_error){
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $sql = $conn->prepare("INSERT INTO drugs (Drug_Name, formula, price, Quantity, Company_Name, Manufacture_Date, Expiry_Date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Bind question marks with proper data
    $sql->bind_param("sssssss", $drug_name, $formula, $price, $quantity, $company_name, $manufacture_date, $expiry_date);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution
    $sql->close();
    $conn->close();
}
?>
