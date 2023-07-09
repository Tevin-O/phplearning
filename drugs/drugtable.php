<?php 
 
 require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
 $query = "select * from drugs";
 $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From DataBase In Php </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class=" bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch Data From DataBase In Php</h2>
                    </div>
                     <div class="card-body">
                        <table class="table table-bordered text-center">
                        <tr class="bg-dark text-white">
                            <td>Trade Name</td>
                            <td>formula</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Company Name</td>
                            <td>Manufacture Date</td>
                            <td>Expiry Date</td>
                          
                        </tr>
                        <tr>
                            <?php
                               while ($row = mysqli_fetch_assoc($result))
                               {
                                    ?>
                                        <td><?php echo $row['Trade_Name'] ?></td>
                                        <td><?php echo $row['formula'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['Quantity'] ?></td>
                                        <td><?php echo $row['Company_Name'] ?></td>
                                        <td><?php echo $row['Manufacture_Date'] ?></td>
                                        <td><?php echo $row['Expiry_Date'] ?></td>

                        </tr>
                                    <?php
                               }
                            ?>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>