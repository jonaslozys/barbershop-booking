<?php 
    require("./config/config.php");
    require("./config/db_config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <div class="text-center">
            
            <a class="btn btn-success" href="<?php echo ROOT_URL; ?>views/select_barber.php">Book an appointment</a>
            
            <a class="btn btn-success" href="<?php echo ROOT_URL; ?>views/staff_login.php">Staff login</a>
         
            
        </div>

    </body>
</html>