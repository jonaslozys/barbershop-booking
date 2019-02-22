<?php 
    // Gets booking by specific date and barber_id from database
    function getBookings($barber_id, $date){
        echo require_once("../config/config.php");
        echo require_once("../config/db_config.php");

        global $conn;
        echo DB_USERNAME;
        echo DB_NAME;
        echo $barber_id;
        echo $date;
        


        $query = "SELECT * FROM bookings WHERE barber_id = '$barber_id' AND DATE(date) = '$date'
                ORDER BY date ASC";

        $results = mysqli_query($conn, $query);

        $bookings = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $bookings;
    }
?>
