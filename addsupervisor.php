<?php

require_once("conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$supervisor_id = $_POST['supervisorid'];
$supervisor_name= $_POST['supervisorname'];
$phone_no = $_POST['phoneno'];





if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into supervisor(SupervisorId,SupervisorName,SupervisorPhoneNo)values(? , ? , ?)");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("ssi",$supervisor_id,$supervisor_name,$phone_no);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}

?>