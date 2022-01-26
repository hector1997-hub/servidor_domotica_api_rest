<?php
    session_start();
    session_destroy();
    header("location: ../dist/login.php");
exit();

?>