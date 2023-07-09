<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <form action="authenticate.php" method="POST">
            <label for="userssn">User Ssn:</label>
            <input type="text" id="userssn" name="userssn" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
