<?php

    class Barber {

        private $name = "";
        private $bio = "";
        private $username = "";
        private $password = "";


        function __construct($name="", $bio="", $username="", $password=""){
            $this->name = $name;
            $this->bio = $bio;
            $this->username = $username;
            $this->password = $password;
        }

        public static function getAllBarbers(){
            global $conn;
        
            $query = "SELECT * FROM barbers";
        
            $results = mysqli_query($conn, $query);
        
            
            $barbers = mysqli_fetch_all($results, MYSQLI_ASSOC);
        
            // Free results
            mysqli_free_result($results);
            
            // Closing connection
            mysqli_close($conn);
    
            return $barbers;
        }
    
        public function addNewBarber(){
            require("../config/config.php");
            require("../config/db_config.php");
        
            $query = "INSERT INTO staff (name, is_barber, username, password) 
                        VALUES ('$this->name', '1', '$this->username', '$this->password')";

            mysqli_query($conn, $query);

            // fetching index value generated by mysql
            $staff_id =  mysqli_insert_id($conn);

            $query = "INSERT INTO barbers (id, name, bio) 
                        VALUES ('$staff_id', '$this->name', '$this->bio')";

            mysqli_query($conn, $query);
            
            // Closing connection
            mysqli_close($conn);
        }

    }

?>
