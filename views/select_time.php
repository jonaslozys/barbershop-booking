<?php 
    require("../config/config.php");
    require("../config/db_config.php");

    session_start();

    $barber_id = $_SESSION["barber_id"];
    $date = $_SESSION["date"];



    require("../API/get_available_times.php");

    $available_times = getAvailableTimes($barber_id, $date, $conn);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
    </head>

    <body>
        <h2>Select one of available times</h2>

        <?php foreach($available_times as $available_time): ;?>
            <p><?php echo $available_time; ?> </p>
        <?php endforeach; ?>
    </body>
</html>