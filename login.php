<?php 
    include_once("header.php");
?>
            <section class="signup-form">
                <h2>Log In</h2>
                <div class="signup-form-form">
                <form action="includes/login.inc.php" method="post">
                <input type="text" name="ssn" placeholder="Ssn/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="submit-login">Log In</button>
                </form>
                </div>
                <?php
if(isset($_GET["error"])){
   if($_GET["error"] == "emptyinput"){
     echo "<p>Fill In All Fields</p>";
   }elseif($_GET["error"] == "wronglogin" ){
    echo "<p>Incorrect Login Information</p>";
   }
}

?>
           </section>

<?php 
    include_once("footer.php");
?>