<?php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$company_name = $_POST['companyname'];
$phone_no = $_POST['phoneno'];
$address = $_POST['address'];
$pharmacutical_comp_id= $_POST['pharmaceuticalcompid']; 





if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into pharmaceuticalcomp(Name,PhoneNo,Address,pharmaceuticalcompid)values(? , ? , ? , ? )");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("siss",$company_name,$phone_no,$address,$pharmacutical_comp_id);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}

?>