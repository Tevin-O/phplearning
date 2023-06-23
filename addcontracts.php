<?php

require_once("conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$contract_id = $_POST['contractid'];
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];
$pharmacy_id= $_POST['pharmacyid']; 
$company_id = $_POST['companyid'];





if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into contracts(ContractId,StartDate,EndDate,PharmacyId,pharmaceuticalcompid)values(? , ? , ? , ? , ?)");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("sssss",$contract_id,$start_date,$end_date,$pharmacy_id,$company_id);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}

?>