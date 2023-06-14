<?php

require_once("config/conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$prescription_id = $_POST['prescriptionid'];
$description = $_POST['description'];
$patient_ssn = $_POST['patientssn'];
$doctor_ssn = $_POST['doctorssn']; 





if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into prescriptions(PrsecriptionId,Description,PatientSsn,DoctorSsn)values(? , ? , ? , ? )");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("ssss",$prescription_id,$description,$patient_ssn,$doctor_ssn);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}

?>