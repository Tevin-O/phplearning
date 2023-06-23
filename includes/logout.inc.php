<?php
   session_start();
   session_unset();
   session_destroy();

   header("Location: ../indexpage.php?error=emptyinput");
   exit();
?>