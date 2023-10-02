<?php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

$drug_name = $_POST['drugname'];
$drug_category = $_POST['drugcategory'];
$formula = $_POST['formula'];
$price = $_POST['price'];
$quantity = $_POST['quantity']; 
$company_name = $_POST['companyname']; 
$manufacture_date = $_POST['manufacturedate']; 
$expiry_date = $_POST['expirydate'];

// Handle file upload
$target_dir = "C:\\xampp\\htdocs\\phplearning\\uploads\\";
$target_file = $target_dir . basename($_FILES["drugimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["drugimage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["drugimage"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $newFileName = basename($_FILES["drugimage"]["name"]); // Get the file name only
    $newFilePath = $target_dir . $newFileName;

    if (move_uploaded_file($_FILES["drugimage"]["tmp_name"], $newFilePath)) {
        // File uploaded successfully, now insert data into database
        $sql = $conn->prepare("INSERT INTO drugs (Drug_Name, category, formula, price, Quantity, Company_Name, Manufacture_Date, Expiry_Date, drugImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssssssss", $drug_name, $drug_category, $formula, $price, $quantity, $company_name, $manufacture_date, $expiry_date, $newFileName);
        
        if ($sql->execute()) {
            echo "Registration Successful";
        } else {
            echo "Error: " . $sql->error;
        }

        

        $sql->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>


