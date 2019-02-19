<?php
    require("../config/config.php");
    session_start();
    $_SESSION["loggedin"] = false;
    session_destroy();
    header("Location: " .ROOT_URL ."views/staff_login.php");
?>