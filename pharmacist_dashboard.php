<?php
session_start(); // Add this line to start the session

// Ensure the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?> (Pharmacist)</h2>

        <h3>Dispense Drugs</h3>
        <!-- Dispense form -->
     
        <h3>View Prescriptions</h3>
        <!-- View Prescriptions Table -->

        <h3>View History Of drugs Dispensed</h3>
        <!--View History of drugs Dispensed-->

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

