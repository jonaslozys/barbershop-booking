<?php
    require("../API/barbers.php");



    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: " .ROOT_URL ."views/staff_login.php");
    }

    // if submitted the form 
    if(isset($_POST["add"])){
        //if fields are not empty
        if(!empty($_POST["name"]) && !empty($_POST["about"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
            $barber = new Barber($_POST["name"], $_POST["about"], $_POST["username"], $_POST["password"]);

            $barber->addNewBarber();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add new emploee</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>
    <body>
        <form action="" method="post">
            <div class="form-group">
                <label>Barber's name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>About</label>
                <input type="text" name="about" class="form-control">
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add" name="add">
            </div>
        </form>
    </body>
</html>