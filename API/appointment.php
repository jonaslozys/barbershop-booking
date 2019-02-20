<?php 
        function getAppointmentById($appointment_id){

            global $conn;

            $query = "SELECT bookings.appointment_id, bookings.date, customers.customer_name, customers.email, customers.phone, customers.visits FROM
                        bookings INNER JOIN customers ON customers.customer_name = bookings.customer_name
                        WHERE bookings.appointment_id = '$appointment_id'";

            $result = mysqli_query($conn, $query);

            $appointment = mysqli_fetch_assoc($result);

            return $appointment;
        }

        function deleteAppointment($appointment_id){
            
            global $conn;

            $query = "DELETE FROM bookings WHERE appointment_id='$appointment_id'";

                        
            if(mysqli_query($conn, $query)){
                echo "<div><b>appointment canceled</b></div>";
            } else {
                echo mysqli_error($conn);
                echo "error, try again";
            }
        }
?>