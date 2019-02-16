<?php
    require("../config/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.js" integrity="sha384-JqNLUzAxpw7zEu6rKS/TNPZ5ayCWPUY601zaig7cUEVfL+pBoLcDiIEkWHjl07Ot" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.css" integrity="sha384-+OB2CadpqXIt7AheMhNaVI99xKH8j8b+bHC8P5m2tkpFopGBklD3IRvYjPekeWIJ" crossorigin="anonymous">
        <title>Best barbershop in town</title>
     
    </head>
    <body>
        <div id="my-calendar"></div>

        <form method = "GET" action="<?php echo ROOT_URL; ?>views/select_time.php">
            <label>Date selected:</label>
            <input id="selected-date" name="date"><br>
            <button name="submit">OK</button>
        </form>


        <script type="text/javascript">
            // Get the element
            var element = document.getElementById("my-calendar");
            // Create the calendar
            var myCalendar = jsCalendar.new(element);
            // Get the inputs
            var inputA = document.getElementById("selected-date");

            myCalendar.onDateClick(function(event, date){
                inputA.value = ((date.getMonth()+1) + "/" + date.getDate() + '/' +  date.getFullYear());
            });
        </script>   
    </body>

            
</html>
