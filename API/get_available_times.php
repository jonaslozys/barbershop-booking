<?php
    function getBookedTimes($barber_id, $date, $conn) {
        // get all records of bookings for a selected barber at a selected date
        $query = "SELECT * FROM bookings WHERE staff_id = $barber_id AND DATE(date) = '" .$date ."'";

        $results = mysqli_query($conn, $query);

        $appointments = mysqli_fetch_all($results, MYSQLI_ASSOC);

        $booked_times = array();

        foreach($appointments as $appointment){
            // Only HOUR:MINUTES data needed
            array_push($booked_times, date('H:i', strtotime($appointment["date"]))); 
        }
        return $booked_times;
    }

    function quarterHourTimes() {
        $formatter = function ($time) {
          return date("H:i", $time);
        };

        // range (start of the workday, end of the workday, intervals) - all in seconds
        $quarterHourSteps = range(18*1800, 38*1800, 900);
        return array_map($formatter, $quarterHourSteps);
      }

    function getAvailableTimes($barber_id, $date, $conn) {
        $booked_times = getBookedTimes($barber_id, $date, $conn);
        $times = quarterHourTimes();

        $available_times = array_diff($times, $booked_times);
        return $available_times;
    }


?>