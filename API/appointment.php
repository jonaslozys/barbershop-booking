<?php 
    

            function getAppointmentById($appointment_id){

            global $conn;

            $query = "SELECT * FROM bookings WHERE appointment_id = '$appointment_id'";

            $result = mysqli_query($conn, $query);
            
            $appointment = mysqli_fetch_assoc($result);

            $customer_name = $appointment["customer_name"];

            $query = "SELECT * FROM customers WHERE customer_name = '$customer_name'";

            $result = mysqli_query($conn, $query);

            $client = mysqli_fetch_assoc($result);

            return $appointment = array_merge($appointment, $client);
        }
?>