<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Drugs</title>
    <link rel="stylesheet" type="text/css" href="drugs.css">
</head>
<body>
    <h1>Drug Details</h1>

    <?php
    require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
    $imageDirectory = "..\\uploads\\cough.jpg";

    // Retrieve drug details from the database
    $sql = "SELECT * FROM drugs ORDER BY category";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $currentCategory = "";
        while($row = $result->fetch_assoc()) {
            if ($row['category'] != $currentCategory) {
                // Start a new section for the current category
                echo "<h2>{$row['category']}</h2>";
                $currentCategory = $row['category'];
            }
            echo "<div class='drug-container'>";
            echo "<h3>{$row['Drug_Name']}</h3>";
           // echo "<p>Formula: {$row['formula']}</p>";
           // echo "<p>Price: {$row['price']}</p>";
            //echo "<p>Quantity: {$row['Quantity']}</p>";
           // echo "<p>Company Name: {$row['Company_Name']}</p>";
          //  echo "<p>Manufacture Date: {$row['Manufacture_Date']}</p>";
           // echo "<p>Expiry Date: {$row['Expiry_Date']}</p>";
           // echo "<img src='{$row['drugImage']}' alt='Drug Image'>";
           echo "<img src='{$imageDirectory}{$row['drugImage']}' alt=''>";
           echo "<a href='view_details.php?drugid={$row['drugid']}'>View Details</a>"; // Pass drugid as a GET parameter
          //  echo "<img src='{$row['drugImage']}' alt='Drug Image'>"; 
           echo "<p>Image Path: {$row['drugImage']}</p>"; // Add this line for debugging
           

            echo "</div>";
        }
    } else {
        echo "No drugs found in the database.";
    }

    $conn->close();
    ?>
</body>
</html>

