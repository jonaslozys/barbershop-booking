<?php

    function registerAppointment($barber_id, $date, $time, $name) {
        $date = $date ." " .$time;

        $query = "INSERT INTO bookings (staff_id, customer_name, date) 
                VALUES ('" .$barber_id ."','" .$name ."','" .$date ."')";

        global $conn;
        
        mysqli_query($conn, $query);

        echo mysqli_error($conn);

        mysqli_close($conn);
    }
?>