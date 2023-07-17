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
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <label for="usertype">User Type:</label>
            <select id="usertype" name="usertype">
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="supervisor">Supervisor</option>
                <option value="admin">Admin</option>
            </select><br><br>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
