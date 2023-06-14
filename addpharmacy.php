<?php
 
 require_once("config/conection.php");

 // Establish database connection
 
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Post method takes input from user using php and places it in database
 //Reference to it in the method of a form in the html file whats inside the parameters is the name of the input.
 // We need to refer to it so that it can work 
 
 $pharmacy_name = $_POST['pharmacyname'];
 $address = $_POST['address'];
 $phone_no = $_POST['phoneno'];
 $inventory = $_POST['inventory']; 
 $price_of_drug = $_POST['priceofdrug'];
 $pharmacy_id = $_POST['pharmacyid'];
 
 
 
 
 
 if ($conn->connect_error){
     die('Connection Failed :' .$conn->connect_error);
 }else {
     $sql = $conn->prepare("insert into pharmacy(Name,Address,PhoneNo,Inventory,PriceOfDrug,PharmcyId)values(? , ? , ? , ? ,? , ?)");
     
     // Bind question marks with proper data
     //Only have 4 data types for binding int,string,double,blob written as i,s,d,b
     //After pass variablenames for the binding
     $sql->bind_param("ssisss",$pharmacy_name,$address,$phone_no,$inventory,$price_of_drug,$pharmacy_id);
 
     // Finally execute the query
     $sql->execute();
     echo "Registration Successful";
 
     // Close the connection and execution
 
     $sql->close();
     $conn->close();
 }


?> 