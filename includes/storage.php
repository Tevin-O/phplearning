<?php 
/*
function emptyInputSignUp($name,$email,$ssn,$phoneno,$password,$passwordRepeat) {
    
    // The variable stores the value of true or false when the function runs
    $result;

    // The empty function checks whether there is data or no data inside variable you pass inside it 
    //If the variable is empty it will run the code inside if statement
    if(empty($name) || empty($email) || empty($ssn) || empty($phoneno) || empty($password) || empty($passwordRepeat)){
        // So if they reult in empty then variable result = true
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidSsn($ssn) {
    
    // The variable stores the value of true or false when the function runs
    $result =true;

    // The empty function checks whether there is data or no data inside variable you pass inside it 
    //Dont want to check if there is empty fields,want to check if there are certain characters in username
    //Preg_match allows you to write a string and if it does not match it throws an error

    if(!preg_match("/^[a-zA-Z0-9]*$/" ,$ssn)){
        // So if they reult in empty then variable result = true
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    
    // The variable stores the value of true or false when the function runs
    $result =true;

    // The empty function checks whether there is data or no data inside variable you pass inside it 
    //Built in function in php to check if email is correct
    //filter_var(pass in email and include statement called filter_validate_email)
    //! means not true as we are checking for errors
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        // So if they reult in empty then variable result = true
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password,$passwordRepeat) {
    
    // The variable stores the value of true or false when the function runs
    $result=true;

    // The empty function checks whether there is data or no data inside variable you pass inside it 
    //Going to check if variable password is not equal to repeat
    if($password !== $passwordRepeat){
        // So if they reult in empty then variable result = true
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

// To check if an ssn already exist is the most complicated one

function ssnExists($conn,$ssn,$email) {

//First thing we do is to test if ssn exists by connecting to db
//Create a basic sql statement first  
// ? is a placeholder as we are going to use preparedstatements to connect to db
//Also check if email is taken as well
$sql = "SELECT * FROM patientsignup WHERE PatientSsn = ? OR PatientEmail = ?;";

//We need to start writing our prepared statement as we need to submit the data in the right way
//init stands for initializing a new prepared statement need to tell it what conection to the db
$stmt = mysqli_stmt_init($conn);
 //After initializing the new prepared statement we need to use the sql statement above to prepare the prepared statement with sql statement  
// This is a security feature as we are using the prepared statemnt and binding it to the sql statemnt so it runs in database without any input from user and later on adds input from user to run separetly this prevents code injected into the db
    
//Lets create an if statemnt that checks if prepared statement runs or fails if we try to run the sql statement in Db
//Check if the mysqli_prepare fails first 
//Its syaing run the sql statement in db and if error do code below
if(!mysqli_stmt_prepare($stmt,$sql)){
    // Sends user to signup page
    header("location: ../signup.php?error=stmtfailed");
        // Exit statement stops the script from running
        exit();
}
//If not failed we need to pass in data from user
//Tell the function where our prepared stmt it is above called $stmt  and what values im submitting and then the variables for the values  
mysqli_stmt_bind_param($stmt,"ss",$ssn,$email);

//Now we need to execute the statement pass in statement that we are executing $stmt

mysqli_stmt_execute($stmt);

//Now lets grab data from db we are going to get results of prepared staement above

$resultData = mysqli_stmt_get_result($stmt);

//Going to run an if statement and check if there is a result in the statement
//Fetching data as an associative array and going to see if there is anything in resultData after we have fetched
if($row = mysqli_fetch_assoc($resultData)){
     return $row;
     // returns all data in database if user exist
}
else{
    $result = false;
    return $result;
}
// Now we are going to close the prepared statement

mysqli_stmt_close($stmt);
}

// Now lets create function that will sign up user in our website

function createUser($conn,$name,$email,$ssn,$phoneno,$password) {
    // Instead of selecting things from db instead we are going to insert things to db
    
    $sql = "INSERT INTO patientsignup (PatientName,PatientEmail,PatientSsn,PatientPhoneNo,PatientsPwd) VALUES (? , ? , ? , ? , ? );";
    
    //We need to start writing our prepared statement as we need to submit the data in the right way
    //init stands for initializing a new prepared statement need to tell it what conection to the db
    $stmt = mysqli_stmt_init($conn);
     //After initializing the new prepared statement we need to use the sql statement above to prepare the prepared statement with sql statement  
    // This is a security feature as we are using the prepared statemnt and binding it to the sql statemnt so it runs in database without any input from user and later on adds input from user to run separetly this prevents code injected into the db
        
    //Lets create an if statemnt that checks if prepared statement runs or fails if we try to run the sql statement in Db
    //Check if the mysqli_prepare fails first 
    //Its syaing run the sql statement in db and if error do code below
    if(!mysqli_stmt_prepare($stmt,$sql)){
        // Sends user to signup page
        header("location: ../signup.php?error=stmtfailed");
            // Exit statement stops the script from running
            exit();
    }

    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    //Pass in 2 parameters the passward variable and the algorithm to be used password_default to hash it
    //Replace $password in bind parameter with the hashedpwd parameter
    //If not failed we need to pass in data from user
    //Tell the function where our prepared stmt it is above called $stmt  and what values im submitting and then the variables for the values  
    // Before we bind the parameters we need to hash the password so as to prevent unathorized users who gained access inDb from understanding it
    mysqli_stmt_bind_param($stmt,"sssis", $name,$email,$ssn,$phoneno,$hashedPwd);
    
    //Now we need to execute the statement pass in statement that we are executing $stmt
    
    mysqli_stmt_execute($stmt);
    
    //We are going to close the prepared statement
    
    mysqli_stmt_close($stmt);

    // Now we need to send user somwhere lets say homepage when they have successfully signed up

    header("location: ../signup.php?error=none");
            // Exit statement stops the script from running
            exit();
    }