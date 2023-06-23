<?php

if(isset($_POST["submit-login"])){
$ssn = $_POST["ssn"];
$pwd = $_POST["pwd"];

require_once("../conection.php");
require_once("functions.inc.php");

if (emptyInputLogin($ssn,$pwd)) {
    header("Location: ../login.php?error=emptyinput");
    exit();
}

loginUser($conn,$ssn,$pwd);
}else{
    header("Location: ../login.php");
    exit();  
}