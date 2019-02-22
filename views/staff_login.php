<?php 
    require("../config/config.php");
    require("../config/db_config.php");

    require("../API/login_staff_member.php");

    session_start();

    $username = $password = "";
    $username_error = $password_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // empty fields
        if(empty(trim($_POST["username"]))){
            $username_error = "username cannot be empty";
        } else $username = $_POST["username"];
        
        if(empty(trim($_POST["password"]))){
            $password_error = "password cannot be empty";
        } else $password = $_POST["password"];
        

        //no errors, perform validation
        if(empty($username_error) && empty($password_error)){
            login($username, $password);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <h2>Staff Login</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_error; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </form>
        
    </div>    
</body>
</html>