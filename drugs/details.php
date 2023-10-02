<?php
// Establish a database connection (assuming you have a function to do this)
require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

if(isset($_GET['drugid'])) {
    $drugID = $_GET['drugid'];

    // Retrieve drug details based on the drug ID from the database
    $sql = "SELECT * FROM drugs WHERE drugid = $drugID";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>{$row['Drug_Name']} Details</h1>";
        echo "<p><strong>Drug ID:</strong> {$row['drugid']}</p>";
        echo "<p><strong>Company Name:</strong> {$row['Company_Name']}</p>";
        echo "<p><strong>Price:</strong> {$row['price']}</p>";
        echo "<p><strong>Quantity:</strong> {$row['Quantity']}</p>";
        echo "<p><strong>Company Name:</strong> {$row['Company_Name']}</p>";
        echo "<p><strong>Manufacture Date:</strong> {$row['Manufacture_Date']}</p>";
        echo "<p><strong>Expiry Date:</strong> {$row['Expiry_Date']}</p>";
    } else {
        echo "Drug details not found for ID: {$drugID}.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
