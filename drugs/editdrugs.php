<?php
// edit.php

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

// Retrieve the record based on the Drug_Name parameter
$drug_name = $_GET['Drug_Name'];

// Retrieve the record from the database
$query = "SELECT * FROM drugs WHERE Drug_Name = '$drug_name'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Record found, retrieve the data
    $row = mysqli_fetch_assoc($result);
    $drug_name = $row['Drug_Name'];
    $formula = $row['formula'];
    $price = $row['price'];
    $quantity = $row['Quantity'];
    $company_name = $row['Company_Name'];
    $manufacture_date = $row['Manufacture_Date'];
    $expiry_date = $row['Expiry_Date'];
} else {
    // Handle the case where the record was not found
    echo "Record not found.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drugs</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Drugs</h2>
        <form action="updatedrugs.php" method="POST">
            <input type="hidden" name="drugname" value="<?php echo $drug_name; ?>">
            <div class="form-group">
                <label for="formula">Formula Name:</label>
                <input type="text" class="form-control" id="formulaName" name="formula" value="<?php echo $formula; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="form-group">
                <label for="companyname">Company Name:</label>
                <input type="text" class="form-control" id="companyname" name="companyname" value="<?php echo $company_name; ?>">
            </div>
            <div class="form-group">
                <label for="manufacturedate">Manufacture Date:</label>
                <input type="text" class="form-control" id="manufacturedate" name="manufacturedate" value="<?php echo $manufacture_date; ?>">
            </div>
            <div class="form-group">
                <label for="expirydate">Expiry Date:</label>
                <input type="text" class="form-control" id="expirydate" name="expirydate" value="<?php echo $expiry_date; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
