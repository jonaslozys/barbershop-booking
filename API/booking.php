<?php 

    class Booking {

        // Gets booking by specific date and barber_id from database
        public function getBookings($barber_id, $date){

            global $conn;

            $query = "SELECT bookings.appointment_id, bookings.customer_name, bookings.date, customers.visits FROM bookings 
                        JOIN customers ON customers.customer_name = bookings.customer_name 
                        WHERE barber_id = '$barber_id' AND DATE(date) = '$date'";
            
            $results = mysqli_query($conn, $query);

            $bookings = mysqli_fetch_all($results, MYSQLI_ASSOC);

            return $bookings;
    }

        
    }

?>
