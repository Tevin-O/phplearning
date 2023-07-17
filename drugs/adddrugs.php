<?php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

// Post method takes input from user using php and places it in database
//Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
// We need to refer to it so that it can work 

$drug_name = $_POST['drugname'];
$formula = $_POST['formula'];
$price = $_POST['price'];
$quantity = $_POST['quantity']; 
$company_name = $_POST['companyname']; 
$manufacture_date = $_POST['manufacturedate']; 
$expiry_date = $_POST['expirydate']; 




if ($conn->connect_error){
    die('Connection Failed :' .$conn->connect_error);
}else {
    $sql = $conn->prepare("insert into drugs(Drug_Name,formula,price,Quantity,Company_Name,Manufacture_Date,Expiry_Date)values(? , ? , ? , ? , ? , ? , ?)");
    
    // Bind question marks with proper data
    //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
    //After pass variablenames for the binding
    $sql->bind_param("sssssss",$drug_name,$formula,$price,$quantity,$company_name,$manufacture_date,$expiry_date);

    // Finally execute the query
    $sql->execute();
    echo "Registration Successful";

    // Close the connection and execution

    $sql->close();
    $conn->close();
}

?>