<?php
session_start(); // Add this line to start the session

// Ensure the user is logged in
if (!isset($_SESSION['userssn']) || !isset($_SESSION['usertype'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supervisor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['userssn']; ?> (Supervisor)</h2>
        
        <!-- Supervisor-specific content here -->
        
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

