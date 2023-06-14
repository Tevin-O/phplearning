<?php
require_once("config/conection.php");


// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$patient_ssn = $_POST['patientid'];
$patient_name = $_POST['patientname'];
$patient_dob = $_POST['patientdob'];
$address = $_POST['address']; 
$city = $_POST['city'];
$sickness = $_POST['sickness'];
$phone_no = $_POST['phoneno'];  
$email = $_POST['email'];


if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into patients(PatientSsn,PatientName,PatientDOB,Address,City,Sickness,PhoneNo,email)values(? , ? , ? , ? , ? , ? , ? , ? )");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("ssssssis",$patient_ssn,$patient_name,$patient_dob,$address,$city,$sickness,$phone_no,$email);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    /*
    // Display what we have input

    $sql2 = "SELECT * FROM patients";

    $results = $conn->query($sql2);

    $row = $results->fetch_assoc();

    print_r($row);
    
    */


    // Close the connection and execution

    $sql->close();
    $conn->close();
}
?>