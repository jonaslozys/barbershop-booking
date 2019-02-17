<?php 
    require("./config/config.php");
    require("./config/db_config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
    </head>

    <body>
        <button><a href="<?php echo ROOT_URL; ?>views/select_barber.php">Book an appointment</a></button>
        <button><a href="<?php echo ROOT_URL; ?>views/staff_login.php">Staff login</a></button>
    </body>
</html>