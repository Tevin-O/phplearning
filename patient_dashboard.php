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
    <title>Patient Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['userssn']; ?> (Patient)</h2>

        <h3>Book Appointment</h3>
        <!-- Appointment booking form -->
        <form action="book_appointment.php" method="POST">
            <label for="appointment_date">Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required><br><br>

            <label for="appointment_time">Time:</label>
            <input type="time" id="appointment_time" name="appointment_time" required><br><br>
            
            <label for="patient_ssn">Patient Ssn:</label>
            <input type="text" id="patient_ssn" name="patient_ssn" required><br><br>

            <input type="submit" value="Book Appointment">
        </form>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

