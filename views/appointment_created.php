<?php
    require("../config/config.php");
    if(isset($_GET["id"])){
    } else {
        echo "error, no booking found";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <h2>Successfully scheduled an appointment!</h2>
        <p>Your appointment id: <b><?php echo $_GET["id"] ;?></b></p>
        <p>Save it to cancel appointment or check its details</p>
        <br>
        <a class = "btn btn-success" href="<?php echo ROOT_URL; ?>">Home</a>
    </body>
</html>