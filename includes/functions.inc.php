<?php

function emptyInputSignUp($name, $email, $ssn, $phoneno, $password, $passwordRepeat) {
    return empty($name) || empty($email) || empty($ssn) || empty($phoneno) || empty($password) || empty($passwordRepeat);
}

function invalidSsn($ssn) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $ssn);
}

function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pwdMatch($password, $passwordRepeat) {
    return $password !== $passwordRepeat;
}

function ssnExists($conn, $ssn, $email) {
    $sql = "SELECT * FROM patientsignup WHERE PatientSsn = ? OR PatientEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $ssn, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $ssn, $phoneno, $password) {
    $sql = "INSERT INTO patientsignup (PatientName, PatientEmail, PatientSsn, PatientPhoneNo, PatientsPwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssis", $name, $email, $ssn, $phoneno, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($ssn, $pwd, ) {
    return empty($ssn) || empty($pwd);
}

function loginUser($conn,$ssn,$pwd) {
    $ssnExists = ssnExists($conn, $ssn, $ssn);
   
   if($ssnExists === false){
    header("location: ../login.php?error=wrongLogin");
    exit();
   } 

   $pwdhashed = $ssnExists["PatientsPwd"];

   $checkpwd = password_verify($pwd,$pwdhashed);

   if($checkpwd === false){
    header("location: ../login.php?error=wrongLogin");
    exit();
   }
   elseif($checkpwd === true){
     session_start();
     $_SESSION["PatientId"] = $ssnExists["PatientId"];
     $_SESSION["PatientSsn"] = $ssnExists["PatientSsn"];
     header("location: ../indexpage.php");
     exit();
   }
}
