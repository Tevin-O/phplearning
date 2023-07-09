<?php
session_start(); // Add this line to start the session

// Ensure the user is logged in
if (!isset($_SESSION['userssn']) || !isset($_SESSION['usertype'])) {
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
        <h2>Welcome, <?php echo $_SESSION['userssn']; ?> (Pharmacist)</h2>

        <h3>Prescribe Drugs</h3>
        <!-- Prescription form -->
        <form action="prescribe_drugs.php" method="POST">
            <label for="prescriptionid">Prescription Id:</label>
            <input type="text" id="prescriptionid" name="prescriptionid" required><br><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required><br><br>

            <label for="patient_ssn">Patient Ssn:</label>
            <input type="text" id="patient_ssn" name="patient_ssn" required><br><br>

            <label for="doctorssn">Doctor Ssn:</label>
            <input type="text" id="doctorssn" name="doctorssn" required><br><br>

            <input type="submit" value="Prescribe Drugs">
        </form>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

