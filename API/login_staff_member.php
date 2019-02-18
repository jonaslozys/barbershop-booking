<?php
    function login($username, $password){
        $query = "SELECT staff_id, username, password FROM staff WHERE username = '$username'";

        global $conn;
        global $password_error;
        global $username_error;
        
        $statement = mysqli_prepare($conn, $query);

        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_store_result($statement);

            if(mysqli_stmt_num_rows($statement) == 1) {

                mysqli_stmt_bind_result($statement, $id, $username, $pass);

                if(mysqli_stmt_fetch($statement)) {

                    if($password == $pass) {
                        session_start();

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        header("Location: " .ROOT_URL ."views/welcome.php");
                    } else {
                        $password_error = "Incorrect password";
                    }
                }
            } else {
                $username_error = "no such user found";
            }
        } else {
            echo "Something went wrong, try again";
        }
        
    }
        
?>
