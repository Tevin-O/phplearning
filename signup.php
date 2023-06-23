<?php 
    include_once("header.php");
?>
            <section class="signup-form">
                <h2>Sign Up</h2>
                <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="email" name="email" placeholder="Email...">
                <input type="text" name="ssn" placeholder="Ssn...">
                <input type="number" name="phone" placeholder="PhoneNo...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="signup-submit">Sign Up</button>
                </form>
                <?php
if(isset($_GET["error"])){
   if($_GET["error"] == "emptyinput"){
     echo "<p>Fill In All Fields</p>";
   }elseif($_GET["error"] == "invalidSsn" ){
    echo "<p>Choose a proper Ssn</p>";
   }elseif($_GET["error"] == "invalidEmail" ){
    echo "<p>Choose a proper Email</p>";
   }elseif($_GET["error"] == "passworddontmatch" ){
    echo "<p>Choose a proper password</p>";
   }elseif($_GET["error"] == "stmtfailed" ){
    echo "<p>Something went wrong</p>";
   }elseif($_GET["error"] == "ssntaken" ){
    echo "<p>Choose a proper Ssn</p>";
   }elseif($_GET["error"] == "none" ){
    echo "<p>You have signed up</p>";
   }
}

?>
           </section>

<?php 
    include_once("footer.php");
?>
