<?php

    function registerAppointment($barber_id, $date, $time, $name, $email, $phone) {
        global $conn;

        $date = $date ." " .$time;

        $query = "INSERT INTO bookings (barber_id, customer_name, date) 
                VALUES ('" .$barber_id ."','" .$name ."','" .$date ."')";

        
        mysqli_query($conn, $query);

        if(!mysqli_error($conn)){
            $appointment_id = mysqli_insert_id($conn);
        }

        $query = "INSERT INTO customers (customer_name, email, phone)
                VALUES ('" .$name ."','" .$email ."','" .$phone ."')";

        

        // If thats a new client booking an appointment, his info will be inserted into
        // customers table. If its repeating client this query will fail as customer_name 
        // is an unique index in customers table;

        if(mysqli_query($conn, $query)) {
            // new client
        } else {
            // reapeating customer
            // 'visits' value needs to be increased
            $query = "SELECT visits FROM customers WHERE customer_name = " ."'$name'";
            $result = mysqli_query($conn, $query);
            $visits = mysqli_fetch_assoc($result);
            $visits = $visits["visits"];
            // 'visits' counter must be increased and updated to db
            $visits++;
            $query = "UPDATE customers 
                        SET visits = " ."'$visits'"
                        ." WHERE customer_name = " ."'$name'";
            mysqli_query($conn, $query);
        }

        if(!mysqli_error($conn)){
            header("Location: " .ROOT_URL ."views/appointment_created.php?id=" .$appointment_id);
        }

        mysqli_close($conn);
    }
?>