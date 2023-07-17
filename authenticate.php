<?php
// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute SQL statement to retrieve the user from the database
$stmt = $conn->prepare("SELECT password, usertype FROM newusers WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($hashedPassword, $usertype);
$stmt->fetch();

// Debugging statements
echo "UserName: " . $username . "<br>";
echo "Hashed Password: " . $hashedPassword . "<br>";
echo "User Type: " . $usertype . "<br>";

// Verify the password and redirect accordingly
if ($hashedPassword && password_verify($password, $hashedPassword)) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = $usertype;

    // Redirect based on user type
    if ($usertype === 'doctor') {
        header("Location: doctor_dashboard.php");
    } elseif ($usertype === 'patient') {
        header("Location: patient_dashboard.php");
    } elseif ($usertype === 'pharmacist') {
        header("Location: pharmacist_dashboard.php");
    } elseif ($usertype === 'supervisor') {
        header("Location: supervisor_dashboard.php");
    }elseif ($usertype === 'admin') {
        header("Location: admin_dashboard.php");
    }
} else {
    echo "Invalid username or password. Please try again.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
