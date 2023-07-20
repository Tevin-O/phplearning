<?php
// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve form data
$prescriptionid = $_POST['prescriptionid'];
$description = $_POST['description'];
$patientname = $_POST['patientName'];
$doctorname = $_POST['doctorName'];
$drugname = $_POST['drugName'];
// Prepare and execute SQL statement to insert the prescription into the database
$stmt = $conn->prepare("INSERT INTO prescriptions (PrescriptionId,Description,PatientName,DoctorName,Drug_Name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $prescriptionid,$description,$patientname,$doctorname,$drugname);
$stmt->execute();

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Redirect the pharmacist back to the pharmacist dashboard
header("Location: doctor_dashboard.php");
exit();
?>
