<?php 
 
 require("conection.php");
 $query = "select * from doctor";
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

    <script>
    // Function to handle edit button click
    function editRecord(DoctorSsn) {
        // Redirect to the edit page with the selected record's SSN
        window.location.href = 'edit.php?DoctorSsn=' + DoctorSsn;
    }

    // Function to handle delete button click
    function deleteRecord(DoctorSsn) {
        if (confirm('Are you sure you want to delete this record?')) {
            // Redirect to the delete page with the selected record's SSN
            window.location.href = 'delete.php?DoctorSsn=' + DoctorSsn;
        }
    }
    </script>

</head>
<body class=" bg-dark">
    <div class="container">
        <div class="row mt-6">
            <div class="col">
                <div class="card mt-6">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch Data From DataBase In Php</h2>
                    </div>
                     <div class="card-body">
                        <table class="table table-bordered text-center">
                        <tr class="bg-secondary text-danger">
                            <td>Doctors Ssn</td>
                            <td>Doctors Name</td>
                            <td>Specialty</td>
                            <td>Years Of Experience</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <tr>
                            <?php
                               while ($row = mysqli_fetch_assoc($result))
                               {
                                    ?>
                                        <td><?php echo $row['DoctorSsn'] ?></td>
                                        <td><?php echo $row['DoctorName'] ?></td>
                                        <td><?php echo $row['Specialty'] ?></td>
                                        <td><?php echo $row['YearsOfExperience'] ?></td>
                                        <td><a href="edit.php?DoctorSsn=100D" class="btn btn-primary"  onclick="editRecord('<?php echo $row['DoctorSsn'] ?>')">Edit</a></td>
                                        <td><a href="delete.php" class="btn btn-danger" onclick="deleteRecord('<?php echo $row['DoctorSsn'] ?>')">Delete</a></td>

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