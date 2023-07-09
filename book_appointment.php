<?php
// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve form data
$appointmentDate = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];
$patientssn = $_SESSION['patient_ssn'];

// Prepare and execute SQL statement to insert the appointment into the database
$stmt = $conn->prepare("INSERT INTO appointments (appointment_date, appointment_time, PatientSsn) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $appointmentDate, $appointmentTime, $patientssn);
$stmt->execute();

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Redirect the patient back to the patient dashboard
header("Location: patient_dashboard.php");
exit();
?>
