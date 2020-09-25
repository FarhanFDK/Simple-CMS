<?php
    class VISITS{
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
        public $column_name;
        public $table_name;
        function connect(){
            $this->mysqli = NEW MySQLi($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->result_selection = $this->mysqli->query($this->selection);
            while($this->row = $this->result_selection->fetch_assoc()){
                $this->visit_number = $this->row[$this->column_name];
                $this->visit_number++;
                $this->sql_update = "UPDATE $this->table_name SET $this->column_name = '$this->visit_number'";
                $this->result = $this->mysqli->query($this->sql_update);
            }
        }
    }
    class VISITS_PAGE extends VISITS{
        
    }