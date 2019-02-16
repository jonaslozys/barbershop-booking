<?php
    require("../config/config.php");
    require("../config/db_config.php");

    $query = "SELECT * FROM barbers";

    $results = mysqli_query($conn, $query);

    
    $barbers = mysqli_fetch_all($results, MYSQLI_ASSOC);

    // Free results
    mysqli_free_result($results);
    
    // Closing connection
    mysqli_close($conn);
?>
