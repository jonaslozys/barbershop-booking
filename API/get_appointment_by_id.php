<?php
    require("../config/config.php");
    require("../config/db_config.php");

    if(isset($_GET["id"])){
        $appointment_id = $_GET["id"];
    }

    $query = "SELECT  bookings.date, customers.customer_name, customers.visits, barbers.name FROM
    bookings INNER JOIN customers ON customers.customer_name = bookings.customer_name
    INNER JOIN barbers ON barbers.id = bookings.barber_id
    WHERE bookings.appointment_id = '$appointment_id'";

    $result = mysqli_query($conn, $query);

    $appointment = mysqli_fetch_assoc($result);
    
    echo "<table class='table'>
        <tr>
            <th>Your name</th>
            <th>Date</th>
            <th>Barber</th>
            <th>Your visits</th>
        </tr>";

    echo "<tr>";
        echo "<td>" .$appointment["customer_name"] ."</td>";
        echo "<td>" .$appointment["date"] ."</td>";
        echo "<td>" .$appointment["name"] ."</td>";
        echo "<td>" .$appointment["visits"] ."</td>";
    echo "</tr>
        </table>";

    mysqli_close($conn);
?>