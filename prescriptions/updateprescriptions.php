<?php
// updatedprescription.php
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the form data
$prescription_id = $_POST['prescriptionid'];
$description = $_POST['description'];
$patient_name = $_POST['patientname'];
$doctor_name = $_POST['doctorname'];
$drug_name = $_POST['drugname'];

// Perform the update query based on the retrieved form data
$query = "UPDATE prescriptions SET Description=?, PatientName=?, DoctorName=? , Drug_Name=? WHERE PrescriptionId=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $description, $patient_name, $doctor_name, $prescription_id, $drug_name);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Update successful, redirect back to the main page or display a success message
    header("Location: prescriptiontable.php"); // Replace "indexpage.php" with your main page
    exit();
} else {
    // Handle the case where the update failed
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
