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
    // Array to store drug details based on filenames
    $drugs = array(
        "cough.jpg" => array("name" => "Cough Syrup", "category" => "", "description" => "Relief for cough and throat irritation.", "drugid" => 13),
        "arv.jpg" => array("name" => "Aids Relief", "category" => "Immune Relief", "description" => "Effective against viruses and tuberculosis.", "drugid" => 15),
        "painkiller.jpg" => array("name" => "Pain Relief", "category" => "Pain Relief", "description" => "Effective against headaches and migraines.", "drugid" => 16),
        "histamine.jpg" => array("name" => "Allergy Relief", "category" => "Scratch Relief", "description" => "Effective against bee stings", "drugid" => 17)
        // Add more drugs as needed
    );

    // Loop through files in the uploads folder
    $imageDirectory = "../uploads/";
    $files = scandir($imageDirectory);

    foreach($files as $file) {
        if(in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
            // Get drug details based on filename
            $drugDetails = $drugs[$file];
            if ($drugDetails) {
                echo "<div class='drug-container'>";
                echo "<h2>{$drugDetails['category']}</h2>";
                echo "<h3>{$drugDetails['name']}</h3>";
                echo "<img src='{$imageDirectory}{$file}' alt='Drug Image'>";
                echo "<p>{$drugDetails['description']}</p>";
                echo "<a href='details.php?drugid={$drugDetails['drugid']}'>View Details</a>";
                echo "</div>";
            } else {
                echo "Drug details not found for {$file}.";
            }
        }
    }
    ?>
</body>
</html>


