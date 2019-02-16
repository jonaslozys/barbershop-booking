<?php
    // Create connection to DB
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check for connection
    if(mysqli_connect_errno()){
        // Connection failed
        echo "Connection failure " . mysqli_connect_errno();
    };
?>