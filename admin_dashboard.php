<?php

session_start(); // Add this line to start the session

// Ensure the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

require_once("C:\\xampp\\htdocs\\phplearning\\config\\conection.php");

$sql = "SELECT * FROM newusers";
$result = $conn->query($sql);

// Fetch all users and display them
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styleadmin.css">
</head>
<body>
<div class="container">
        <div class="content">
            <h2>Welcome, <?php echo $_SESSION['username']; ?><br> <span>(ADMIN) </span></h2>
            <p>This is an Admin page</p>
            
            <!-- Display user information -->
            <h3>All Users:</h3>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Type</th>
                        <th>User Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['user_name']; ?></td>
                            <td><?php echo $user['usertype']; ?></td>
                            <td><?php echo $user['user_email']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>



