<?php 
    require("../config/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your appointment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script>
            function getInfo(){
                var id = document.getElementById("id").value;
                if(id.length === 0){
                    alert("enter your appointment id!");
                    return; 
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if(this.readyState === 4 && this.status == 200){
                            document.getElementById("appointment_data").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "<?php echo ROOT_URL ."API/get_appointment_by_id.php?id="; ?>"+id, true);
                    xmlhttp.send();
                }
                
            }
        </script>
    </head>

    <body>
            Enter your apoointment ID:
            <input id="id" type="text" placeholder="appointment id">
            <button onclick="getInfo()">Get details</button>
            <br>
            <br>
            <div id="appointment_data">

            </div>
            
            <a class = "btn btn-danger" href="">Cancel appointment</a>
            
    </body>
</html>
