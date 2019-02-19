<?php
    require("../config/config.php");

    // Destroy session
    session_start();
    $_SESSION["loggedin"] = false;
    session_destroy();

    //Redirect to login screen
    header("Location: " .ROOT_URL ."views/staff_login.php");
?>