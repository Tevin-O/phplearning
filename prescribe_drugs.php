<?php
// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve form data
$prescriptionid = $_POST['prescriptionid'];
$description = $_POST['description'];
$patientssn = $_POST['patient_ssn'];
$doctorssn = $_POST['doctorssn'];

// Prepare and execute SQL statement to insert the prescription into the database
$stmt = $conn->prepare("INSERT INTO prescriptions (PrescriptionId,Description,PatientSsn,DoctorSsn) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $prescriptionid,$description,$patientssn,$doctorssn);
$stmt->execute();

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Redirect the pharmacist back to the pharmacist dashboard
header("Location: pharmacist_dashboard.php");
exit();
?>
