<?php
    require("../API/get_barbers.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
    </head>

    <body>
        <h1>Select a barber</h1>
        <?php foreach($barbers as $barber): ;?>
            <h3>Name</h3>
            <?php echo $barber["name"]; ?>
            <h3>Bio/about</h3>
            <?php echo $barber["bio"]; ?>
            <button><a href="<?php echo ROOT_URL; ?>views/select_date.php">Book</a></button>
            <br/>
            <br/>
            <br/>
        <?php endforeach; ?>
    </body>
</html>