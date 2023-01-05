<?php
//echo "Connected successfully";
    class utilities{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "complain";
        public $conn;

        function __construct(){
            // Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if (mysqli_connect_error()) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            // echo "Connected successfully";
        }
        function action_query($sql){
            //  $sql = "INSERT INTO tbl_member (fullname, phone_number, email_address, sex, department, password)VALUES ('deo', '08120843796', 'john@example.com', 'femsale', 'com', 'tunde')";
            //echo $sql;
            if ($this->conn->query($sql) === TRUE) {
                $last_id = $this->conn->insert_id;
                return $last_id;
                //echo ("New record created successfully. Last inserted ID is: " . $last_id);
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }
        // function excecut_all($sql){
        //     //$sql = "SELECT email,password FROM tbl_user WHERE email = '$email'";
        //     $q =  $this->conn->query($sql);
        //     $r = mysqli_fetch_array($q);
        //     return $r;
        // }
        function execut_taxk($sql){
            $q =  $this->conn->query($sql); // notice the "as `total`
            $r = mysqli_fetch_array($q); // will return the result
            $t = $r['total'];
            return $t;
        }
        function select_query($sql){
            // $sql = "SELECT * FROM tbl_member";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                //output data of each row
                $row = $result->fetch_assoc();
                return $row;
            
          
            } else {
                return 0;  
            }
        }
    }
?>