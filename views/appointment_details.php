<?php 
    require("../config/config.php");
    require("../config/db_config.php");
    require("../API/appointment.php");

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: " .ROOT_URL ."views/staff_login.php");
    }

    if($appointmentDetails = getAppointmentById($_GET["id"])){

    } else {
        echo "error, no such appointment found";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Appointment deailts</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>

    <?php require("../components/logged_in_header.php"); ?>

    <body>
        <div class = "container">
            <a class = "btn btn-info" href="javascript:history.go(-1)">Back</a>
            <h3>Date: <b><?php echo $appointmentDetails["date"]; ?></b></h3>
            <h3>Customer name: <b><?php echo $appointmentDetails["customer_name"]; ?></b></h3>
            <h3>Customer's email: <b><?php echo $appointmentDetails["email"]; ?></b></h3>
            <h3>Customer's phone number: <b><?php echo $appointmentDetails["phone"]; ?></b></h3>
            <h3>Number of visits: <b><?php echo $appointmentDetails["visits"] ;?></b></h3>
            <a class = "btn btn-danger" href="<?php echo ROOT_URL ."views/cancel_appointment.php?id=" .$appointmentDetails["appointment_id"];?>">Cancel appointment</a>
            

        </div>
    </body>
</html>