<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Signup</h2>
        <form action="register.php" method="POST" onsubmit="return showMessage();">
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="useremail">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

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

            <input type="submit" value="Signup">
        </form>
    </div>
    <script>
        function showMessage() {
            var messageDiv = document.createElement("div");
            messageDiv.className = "success-message";

            
            var closeButton = document.createElement("span");
            closeButton.className = "success-message-close";
            closeButton.innerHTML = "X";
            closeButton.onclick = function () {
                document.body.removeChild(messageDiv);
            };

            messageDiv.innerText = "User successfully registered ";
            messageDiv.appendChild(closeButton);

            document.body.appendChild(messageDiv);

            // Hide the message after 3 seconds (3000 milliseconds)
            setTimeout(function () {
                messageDiv.style.display = "none";
            }, 3000); // Hide the message after 3 seconds (3000 milliseconds)
        }
    </script>
</body>
</html>
