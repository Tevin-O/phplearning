<?php 
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PROJECT: DRUG DISPENSING TOOL</title>
</head>
<body>
    <nav>
        <div class ="wrapper">
            <a href="indexpage.php"><img src="" alt="Drug Dispensing Logo"></a>
                <ul>
                    <li><a href="indexpage.php">Home</a></li>
                    <li><a href="discover.php">About Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <?php 
                        if(isset($_SESSION["PatientSsn"])){
                            echo ("<li><a href='profile.php'>Profile Page</a></li>");
                            echo ("<li><a href='includes/logout.inc.php'>Log Out</a></li>");
                        }
                        else{
                            echo ("<li><a href='signup.php'>Sign Up</a></li>");
                            echo ("<li><a href='login.php'>Log In</a></li>");
                        }
                    ?>
                    
                </ul>
        </div>
    </nav>

        <div class="wrapper">