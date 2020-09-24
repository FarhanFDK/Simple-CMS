<?php 
    class DB_VISITS{
        public $host_name;
        public $user_name;
        public $user_pass;
        public $db_name;
        public $sql;
        public $selection;
        public $visit_number;
        public $result_selection;
        public $result;
        public $mysqli;
        public $sql_update;
        public $row;
        function connect(){
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name   = 'visits';
            $this->mysqli = NEW MySQLi($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->selection = 'SELECT * FROM visits';
            $this->result_selection = $this->mysqli->query($this->selection);
            while($this->row = $this->result_selection->fetch_assoc()){
                $this->visit_number = $this->row['visit_number'];
                $this->visit_number++;
                $this->sql_update = "UPDATE visits SET visit_number = '$this->visit_number'";
                $this->result = $this->mysqli->query($this->sql_update);
            }
        }
    }
?>