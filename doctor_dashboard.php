<?php
session_start(); // Add this line to start the session

// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['userssn']; ?> (Doctor)</h2>
        <h3>Patient List</h3>
        <!-- Display the list of patients -->
        <?php
        // Retrieve and display the list of patients from the database
        $stmt = $conn->prepare("SELECT user_Ssn FROM newusers WHERE usertype = 'patient'");
        $stmt->execute();
        $stmt->bind_result($patientssn);
        while ($stmt->fetch()) {
            echo "<p>$patientssn</p>";
        }
        $stmt->close();
        ?>

        <h3>Prescriptions</h3>
        <!-- Display the list of prescriptions -->
        <?php
        // Retrieve and display the list of prescriptions from the database
        $stmt = $conn->prepare("SELECT Description FROM prescriptions");
        $stmt->execute();
        $stmt->bind_result($description);
        while ($stmt->fetch()) {
            echo "<p>$description</p>";
        }
        $stmt->close();
        ?>

        <h3>Upcoming Appointments</h3>
        <!-- Display the list of upcoming appointments -->
        <?php
        // Retrieve and display the list of upcoming appointments from the database
        $stmt = $conn->prepare("SELECT appointment_date, appointment_time FROM appointments WHERE doctor = ?");
        $stmt->bind_param("s", $_SESSION['userssn']);
        $stmt->execute();
        $stmt->bind_result($appointmentDate, $appointmentTime);
        while ($stmt->fetch()) {
            echo "<p>Date: $appointmentDate, Time: $appointmentTime</p>";
        }
        $stmt->close();
        ?>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
