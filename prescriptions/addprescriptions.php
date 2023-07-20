<?php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Establish database connection


// Post method takes input from user using PHP and places it in the database
$prescription_id = $_POST['prescriptionid'];
$description = $_POST['description'];
$patient_name = $_POST['patientname'];
$doctor_name = $_POST['doctorname'];
$drug_name = $_POST['drugname'];

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $sql = $conn->prepare("INSERT INTO prescriptions (PrsecriptionId, Description, PatientName, DoctorName,Drug_Name) VALUES (?, ?, ?, ?, ?)");

    // Bind question marks with proper data
    $sql->bind_param("sssss", $prescription_id, $description, $patient_name, $doctor_name,$drug_name);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution
    $sql->close();
    $conn->close();
}
?>
