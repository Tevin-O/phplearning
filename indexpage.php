<?php 
    include_once("header.php");
?>
            <section class="index-intro">

            <?php 
                        if(isset($_SESSION["PatientSsn"])){
                            echo ("<p>Hello there " .$_SESSION["PatientSsn"] ." </p>");
                        }
            ?>

                <h1>Welcome To Our Website</h1>
                <p>Our website was first formed so as to solve the problem of time wastage where a patient needs to go to the hospital.But with this drug dispensing tool we are bringing our doctor right to the patient.</p>
            </section>

            <section class="index-categories">
                    <h2>Some Basic Categories</h2>
                    <div class="index-categories-list">
                        <div>
                            <h3>Fun Stuff</h3>
                        </div>
                        <div>
                            <h3>Serious Stuff</h3>
                        </div>
                        <div>
                            <h3>Exciting Stuff</h3>
                        </div>
                        <div>
                            <h3>Boring Stuff</h3>
                        </div>
                    </div>
            </section>

<?php 
    include_once("footer.php");
?>

