<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype'])) {
    header("Location: login.php");
    exit();
}

// Handle the dispense form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the dispense form data
    $patientName = $_POST['patient_name'];
    $prescribedDrug = $_POST['prescribed_drug'];
    $prescribedQuantity = $_POST['prescribed_quantity'];
    $doctorName = $_POST['doctor_name'];

    // Store the dispensed drug information in a table (replace "your_table_name" with the actual table name)
    require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
    $query = "INSERT INTO dispenseddrugs (patient_name, prescribed_drug, prescribed_quantity, doctor_name) VALUES ('$patientName', '$prescribedDrug', '$prescribedQuantity', '$doctorName')";
    mysqli_query($conn, $query);
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Pharmacist Dashboard</title>
  <link rel="stylesheet" type="text/css" href="pharmacistdash.css">
</head>
<body>
  <div class="container">
    <div>
      <h2>Welcome, <?php echo $_SESSION['username']; ?> (Pharmacist)</h2>
      <div>
      <h3>Dispense Drugs</h3>
      <!-- Dispense form -->
      <form method="POST" action="">
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>
        <br>
        <label for="prescribed_drug">Prescribed Drug:</label>
        <input type="text" id="prescribed_drug" name="prescribed_drug" required>
        <br>
        <label for="prescribed_quantity">Prescribed Quantity:</label>
        <input type="text" id="prescribed_quantity" name="prescribed_quantity" required>
        <br>
        <label for="doctor_name">Doctor Name:</label>
        <input type="text" id="doctor_name" name="doctor_name" required>
        <br>
        <input type="submit" value="Dispense">
      </form>
      </div>
    </div>

    <div>
      <h3>View Prescriptions</h3>
      <!-- View Prescriptions Table -->
      <?php
      // Retrieve prescriptions from the table (replace "your_table_name" with the actual table name)
      require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
      $query = "SELECT * FROM prescriptions";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>PrescriptionId</th><th>Description</th><th>PatientName</th><th>DoctorName</th><th>Drug_Name</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['PrescriptionId'] . "</td>";
          echo "<td>" . $row['Description'] . "</td>";
          echo "<td>" . $row['PatientName'] . "</td>";
          echo "<td>" . $row['DoctorName'] . "</td>";
          echo "<td>" . $row['Drug_Name'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "No prescriptions found.";
      }
      ?>
    </div>

    <div>
      <h3>View History Of Drugs Dispensed</h3>
      <!-- View History of drugs Dispensed -->
      <?php
      // Retrieve the history of dispensed drugs from the table (replace "your_table_name" with the actual table name)
      $query = "SELECT * FROM dispenseddrugs";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Patient Name</th><th>Prescribed Drug</th><th>Prescribed Quantity</th><th>Doctor Name</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['patient_name'] . "</td>";
          echo "<td>" . $row['prescribed_drug'] . "</td>";
          echo "<td>" . $row['prescribed_quantity'] . "</td>";
          echo "<td>" . $row['doctor_name'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "No dispensed drugs found.";
      }

      mysqli_close($conn);
      ?>
    </div>
  </div>

  <div class="logout-btn">
  <a href="logout.php">Logout</a>
  </div>
</body>
</html>
