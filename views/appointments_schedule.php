<?php
    require("../config/config.php");
    require("../config/db_config.php");
    require("../API/get_bookings.php");
    require("../API/barbers.php");

    $barbers = new Barber("","","","");
    $barbers = $barbers->getAllBarbers();

    session_start();
    
    // Check if user is authorized to access this page, if not, redirect to login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: " .ROOT_URL ."views/staff_login.php");
    }
    if(isset($_GET["staff_id"]) && isset($_GET["date"])){
        $bookings = getBookings($_GET["staff_id"], $_GET["date"]);
    }
    if(isset($_POST["logout"])){
        echo "logout";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>
    <body>
        <?php require_once("../components/logged_in_header.php"); ?>
        <input type="date" id="start" name="trip-start"
       value=<?php echo date("Y-m-d"); ?>
       min=<?php echo date("Y-m-d"); ?> >

        <div class = "container">
            <h2>Schedule for 
                <b><?php echo date("Y M d", strtotime($_GET["date"])); ?></b>
                for <b><?php echo $bookings["name"]; ?></b>
            </h2>
            <?php foreach($bookings as $booking): ;?>
                <h3>Cutomer name: <b><?php echo $booking["customer_name"]; ?></b></h3>
                <h3>Time: <b><?php echo date("H:i", strtotime($booking["date"])); ?></b></h3>
                <a class ="btn btn-success" href="<?php  echo (ROOT_URL ."views/appointment_details.php?id=" .$booking["appointment_id"]);?>">More</a>
            <?php endforeach ;?>
        </div>

        
    </body>
</html>