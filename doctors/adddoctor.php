<?php


require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$doctor_ssn = $_POST['doctorsid'];
$doctor_name = $_POST['doctorsname'];
$specialty = $_POST['doctorsspecialty'];
$years_of_experience = $_POST['yearsofexperience']; 


if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into doctor(DoctorSsn,DoctorName,Specialty,YearsOfExperience)values(? , ? , ? , ? )");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("sssi",$doctor_ssn,$doctor_name,$specialty,$years_of_experience);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}


/*
// sql to delete a record
$sql = "DELETE FROM drugs ";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

$sql = "INSERT INTO doctor (DoctorSsn,DoctorName,Specialty,YearsOfExperience)
Values ('$doctor_ssn','$doctor_name','$specialty', '$years_of_experience')";

*/
?>


