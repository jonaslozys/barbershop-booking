<?php
    require("../config/config.php");
    require("../config/db_config.php");
    require("../API/appointment.php");

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: " .ROOT_URL ."views/staff_login.php");
    }

    if(isset($_POST["cancel"]) && isset($_GET["id"])){
        echo "canceling";
        deleteAppointment($_GET["id"]);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Canceled</title>
    </head>

    <body>
        <h3>Are you sure you want to cancel appointment?</h3>
        <form method="post" action="">
            <button name="cancel" >YES</button>   
        </form>
    </body>
</html>