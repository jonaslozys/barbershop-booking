<?php
    require("../config/config.php");
    require("../config/db_config.php");
    require("../API/register_appointment.php");
    session_start();

    if(isset($_POST["submit"])){
        if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["phone"])){
            registerAppointment(
                $_SESSION["barber_id"], $_SESSION["date"], $_SESSION["time"], $_POST["name"],
                $_POST["email"], $_POST["phone"]
            );
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <h2>Finish booking</h2>

        <ul>
            <li>Date: <b><?php echo $_SESSION["date"]; ?></b></li>
            <li>Time: <b><?php echo $_SESSION["time"]; ?></b></li>
        </ul>

        <form method="post" action="">
            <label for="name">Your name and surname</label>
            <input class="form-control" type="text" name="name" id="name">
            <br> 
            <label for="email">Your email address</label>
            <input class="form-control" type="text" name="email" id="email">
            <br>
            <label for="phone">Your phone number</label>
            <input class="form-control" type="text" name="phone" id="phone">
            <br>
            <button class="btn btn-success" name="submit">SUBMIT</button>
        </form>
    </body>
</html>