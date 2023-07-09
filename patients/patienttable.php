<?php 
 
 require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");
 $query = "select * from patients";
 $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From DataBase In Php </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                            <td>Patient Ssn</td>
                            <td>Patients Name</td>
                            <td>Date Of Birth</td>
                            <td>Addresss</td>
                            <td>City</td>
                            <td>Sickness</td>
                            <td>PhoneNo</td>
                            <td>Email</td>
                        </tr>
                        <tr>
                            <?php
                               while ($row = mysqli_fetch_assoc($result))
                               {
                                    ?>
                                        <td><?php echo $row['PatientSsn'] ?></td>
                                        <td><?php echo $row['PatientName'] ?></td>
                                        <td><?php echo $row['PatientDOB'] ?></td>
                                        <td><?php echo $row['Address'] ?></td>
                                        <td><?php echo $row['City'] ?></td>
                                        <td><?php echo $row['Sickness'] ?></td>
                                        <td><?php echo $row['PhoneNo'] ?></td>
                                        <td><?php echo $row['email'] ?></td>

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