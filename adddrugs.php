<?php


require_once("conection.php");

// Establish database connection

$conn = new mysqli($servername, $username, $password, $database);

$trade_name = "PainKiller";
$drug_formula = "PK";
$drug_price = "100Ksh";
$drug_quantity = "100g";
$company_name ="MedicoLtd";
$manufacture_date = 2020-04-13;
$expiry_date = 2025-04-13;

$sql = "INSERT INTO drugs (Trade_Name,formula,price,Quantity,Company_Name,Manufacture_Date,Expiry_Date)
Values ('$trade_name','$drug_formula','$drug_price', '$drug_quantity','$company_name','$manufacture_date','$expiry_date')";

if ($conn->query($sql) === TRUE){
    echo "New record created succcessfully";
}else {
    echo "Error:" .$sql  . "<br>". $conn->error;
}

/*
// sql to delete a record
$sql = "DELETE FROM drugs ";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
*/

$conn->close();
?>