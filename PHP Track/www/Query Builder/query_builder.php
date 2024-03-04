<?php 
    class QueryBuilder extends Database {
        public $query;
        protected $table = ' ';

        public function __construct($db_name) {
            define('DB_DATABASE', $db_name);
            $this->connect($db_name);
        }

        public function select($array) {
            $this->query = "SELECT ";
            if (count($array) > 0) {
                foreach ($array as $index => $field) {
                    $this->query .= $field . ", ";
                } 
                $this->query = rtrim($this->query, ", "); 
            }
            else {
                $this->query .= "* ";
            }

            $this->query .= " FROM " . $this->table . " ";
            
            return $this;
        }

        public function where($array) {
            $this->query .= "WHERE ";
            foreach ($array as $key => $value) {
                $this->query .= "$key = '$value' AND ";
            }
            $this->query = rtrim($this->query, "AND ");
            return $this;
        }

        public function group_by($field) {
            $this->query .= "GROUP BY $field ";
            return $this;
        }

        public function having($field, $operator, $value) {
            $this->query .= "HAVING $field $operator '$value' ";
            return $this;
        }

        public function get() {
            $result = $this->fetch_all($this->query);
            return $result;
        }
    }
?>