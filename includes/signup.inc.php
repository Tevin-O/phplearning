  <?php
/*
if (isset($_POST["signup-submit"])) {
  echo "it works";

  $name = $_POST["name"];
  $email = $_POST["email"];
  $ssn = $_POST["ssn"];
  $phoneno = $_POST["phone"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwdrepeat"];

  // Error handling to catch any errors user might make when registering
  require_once("../config/conection.php");
  require_once("functions.inc.php");

 // var_dump($name, $email, $ssn, $phoneno, $password, $passwordRepeat);

  // First error to catch is if the user left blanks in the sign-up form
  if (emptyInputSignUp($name, $email, $ssn, $phoneno, $password, $passwordRepeat)) {
      header("Location: ../signup.php?error=emptyinput");
      exit();
  }

  // Now let's check if the SSN the user typed is correct
  if (invalidSsn($ssn)) {
      header("Location: ../signup.php?error=invalidssn");
      exit();
  }

  // Now let's check if it's the correct email address
  if (invalidEmail($email)) {
      header("Location: ../signup.php?error=invalidemail");
      exit();
  }

  // Now let's check if the passwords don't match
  if (pwdMatch($password, $passwordRepeat)) {
      header("Location: ../signup.php?error=passworddontmatch");
      exit();
  }

  // Now let's check if the SSN is already in the database
  if (ssnExists($conn, $ssn, $email)) {
      header("Location: ../signup.php?error=ssnalreadyexists");
      exit();
  }

  // At this point, the user hasn't made any errors, so we need to sign them up to our website
  createUser($conn, $name, $email, $ssn, $phoneno, $password);

  // Now we just have to create the functions referenced above in our functions.inc.php file
} else {
  // Header tag sends the user to the signup page if there is an error
  header("Location: ../signup.php");
  exit();
}
