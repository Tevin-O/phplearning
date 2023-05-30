<?php
require_once("connection.php");

$first_name = "Mary";
$email = "mary@gmail.com";
$phone = "0723456789";
$last_name = "James";

$sql = "INSERT INTO Patients (firstname, lastname, email)
Values ('$first_name','$last_name','$email')";
if ($conn->query($sql) === TRUE){
    echo "New record created succcessfully";
}else {
    echo "Error:" .$sql  . "<br>". $conn->error;
}
$conn->close();
?>