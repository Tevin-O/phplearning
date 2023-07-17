<?php
session_start();

// Database connection details
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Function to sanitize user input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the search form is submitted
if (isset($_POST['search'])) {
    $searchTerm = sanitizeInput($_POST['searchTerm']);
    // Retrieve and display the list of patients based on the search term
    $stmt = $conn->prepare("SELECT user_name FROM newusers WHERE usertype = 'patient' AND user_name LIKE ?");
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $stmt->bind_result($patientName);

    // Generate a table to display the search results
    if ($stmt->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        echo "<table>";
        echo "<thead><tr><th>Patient Name</th></tr></thead>";
        echo "<tbody>";
        while ($stmt->fetch()) {
            echo "<tr><td>$patientName</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    $stmt->close();
}

// Check if the prescription form is submitted
if (isset($_POST['prescribe'])) {
    $prescriptionid = sanitizeInput($_POST['prescriptionid']);
    $description = sanitizeInput($_POST['description']);
    $patientName = sanitizeInput($_POST['patientName']);
    $doctorname = sanitizeInput($_POST['doctorName']);
    $drugName = sanitizeInput($_POST['drugName']);


    // Check if the drug is available in the database
    $stmt = $conn->prepare("SELECT * FROM drugs WHERE Drug_Name = ?");
    $stmt->bind_param("s", $drugName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the prescription table
        $stmt = $conn->prepare("INSERT INTO prescriptions (PrescriptionId,Description,PatientName,DoctorName,Drug_Name) VALUES (?, ?,?,?,?)");
        $stmt->bind_param("sssss", $prescriptionid, $description,$patientname,$doctorname,$drugname);
        $stmt->execute();

        echo "<p>Prescription added successfully.</p>";
    } else {
        echo "<p>Drug not available.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="doctordash.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?> (Doctor)</h2>
        <h3>Patient List</h3>

        <!-- Search form -->
        <form method="POST" action="">
            <input type="text" name="searchTerm" placeholder="Search for patients">
            <button type="submit" name="search">Search</button>
        </form>

        <!-- Display the list of patients and prescriptions -->
        <div class="table-container">
            <!-- Patients table -->
            <table>
            <thead>
                    <tr>
                        <th>Patient Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Retrieve and display the list of patients from the database
                    $stmt = $conn->prepare("SELECT user_name FROM newusers WHERE usertype = 'patient'");
                    $stmt->execute();
                    $stmt->bind_result($patientName);

                    while ($stmt->fetch()) {
                        echo "<tr><td>$patientName</td></tr>";
                    }

                    $stmt->close();
                    ?>
                </tbody>
            </table>

            <!-- Prescriptions table -->
            <table>
            <thead>
                    <tr>
                        <th>Prescription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Retrieve and display the list of prescriptions from the database
                    $stmt = $conn->prepare("SELECT Description FROM prescriptions");
                    $stmt->execute();
                    $stmt->bind_result($description);

                    while ($stmt->fetch()) {
                        echo "<tr><td>$description</td></tr>";
                    }

                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Prescription form -->
        <h3>Prescribe Drug</h3>
        <form method="POST" action="" class="prescription-form">

            <label for="prescriptionid">Prescription ID:</label>
            <input type="text" name="prescriptionid" required>

            <label for="description">Description:</label>
            <input type="text" name="description" required>
        
            <label for="patientName">Patient Name:</label>
            <input type="text" name="patientName" required>

            <label for="doctorName">Doctor Name:</label>
            <input type="text" name="doctorName" required>

            <label for="drugName">Drug Name:</label>
            <input type="text" name="drugName" required>

            <button type="submit" name="prescribe">Prescribe</button>
        </form>

        <!-- Upcoming Appointments table -->
        <h3>Upcoming Appointments</h3>
        <table>
        <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Patient Ssn</th>
                    <th>Patient Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve and display the list of upcoming appointments from the database
                $stmt = $conn->prepare("SELECT appointment_date, appointment_time, PatientSsn, PatientName FROM appointments WHERE doctor_name = ?");
                $stmt->bind_param("s", $_SESSION['username']);
                $stmt->execute();
                $stmt->bind_result($appointmentDate, $appointmentTime, $patientSsn, $patientName);

                while ($stmt->fetch()) {
                    echo "<tr><td>$appointmentDate</td><td>$appointmentTime</td><td>$patientSsn</td><td>$patientName</td></tr>";
                }

                $stmt->close();
                ?>
            </tbody>
        </table>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>



