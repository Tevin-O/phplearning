<?php 
require_once("conection.php");

function display_data(){
    global $conn;
    $query = "select * from ";
    $result = mysqli_query($conn,$query);
    return $result;
}
?>