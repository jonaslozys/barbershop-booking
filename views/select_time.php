<?php 
    require("../config/config.php");
    require("../config/db_config.php");

    session_start();

    if(isset($_POST["time"])){
        $_SESSION["time"] = $_POST["time"];
        header("Location: ".ROOT_URL ."views/final_booking_form.php");
    }

    $barber_id = $_SESSION["barber_id"];
    $date = $_SESSION["date"];

    require("../API/get_available_times.php");

    $available_times = getAvailableTimes($barber_id, $date, $conn);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <h2>Select one of available times</h2>

        <form action="" method="post">
            <div class="d-flex flex-column">
            <?php foreach($available_times as $available_time): ;?>
                <button class="btn btn-info" name="time" value="<?php echo $available_time; ?>"><?php echo $available_time; ?></button>
            <?php endforeach; ?>
            </div>
        </form>

    </body>
</html>