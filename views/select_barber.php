<?php
    require("../config/config.php");
    require("../config/db_config.php");
    require("../API/barbers.php");
    $barbers = new Barber;
    $barbers = $barbers -> getAllBarbers();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Best barbershop in town</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>

    <div class="container">
        <h1>Select a barber</h1>
            <?php foreach($barbers as $barber): ;?>
                <div class="col align-self-center">
                    <h3>Name: <b><?php echo $barber["name"]; ?></b> </h3>
                    <h3>Bio/about: <b><?php echo $barber["bio"]; ?></b></h3>
                    <a class="btn btn-success" href="<?php echo ROOT_URL; ?>views/select_date.php?barber_id=<?php echo $barber["id"];?>">Book</a>
                    <br>
                    <br>
                </div>
            <?php endforeach; ?>
    </div>
    </body>
</html>