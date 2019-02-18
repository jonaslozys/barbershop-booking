<?php 

    // Gets booking by specific date and barber_id from database
    function getBookings($barber_id, $date){

        global $conn;

        $query = "SELECT * FROM bookings WHERE barber_id = '$barber_id' AND DATE(date) = '$date'";
        
        $results = mysqli_query($conn, $query);

        $bookings = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $bookings;
    }
?>
