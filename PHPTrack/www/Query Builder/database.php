<?php 
    class Database {
        public $connection;

        public function __construct() {
            //adjust the values below to match your database settings
            define('DB_HOST', 'localhost');
            define('DB_USER', 'root');
            define('DB_PASS', ''); //may need to set DB_PASS as 'root'
        }

        public function connect($db_name) {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, $db_name);
        }

        //SELECT - used when expecting single OR multiple results
        //returns an array that contains one or more associative arrays
        public function fetch_all($query) {
            $data = array();
            $result = $this->connection->query($query);
            while($row = mysqli_fetch_assoc($result)) 
            {
                $data[] = $row;
            }
            return $data;
        }

        //SELECT - used when expecting a single result
        //returns an associative array
        public function fetch_record($query) {
            $result = $this->connection->query($query);
            return mysqli_fetch_assoc($result);
        }

        //used to run INSERT/DELETE/UPDATE, queries that don't return a value
        //returns a value, the id of the most recently inserted record in your database
        public function run_mysql_query($query) {
            $result = $this->connection->query($query);
            return $this->connection->insert_id;
        }

        //returns an escaped string. EG, the string "That's crazy!" will be returned as "That\'s crazy!"
        //also helps secure your database against SQL injection
        public function escape_this_string($string)
        {
            return $this->connection->real_escape_string($string);
        }
    }
?>