<?php
// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve form data
$username = $_POST['username'];
$useremail = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement to insert the user into the database
$stmt = $conn->prepare("INSERT INTO newusers (user_name,user_email,password,usertype) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username,$useremail,$hashedPassword, $usertype);
$stmt->execute();

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Redirect the user to the login page
header("Location: login.php");
exit();
?>
