<?php
    class SCANNER{
        public $directory;
        public $handle;
        public $entry;
        function connect(){
            if ($this->handle = opendir($this->directory)) {
                while (false !== ($this->entry = readdir($this->handle))) {
                    if ($this->entry != "." && $this->entry != "..") {
            
                        echo "$this->entry\n";
                    }
                }
                closedir($this->handle);
            }
        }  
    }

    
    class DIR_CREATOR{
        public $directory;
        function connect(){
            if(!is_dir($this->directory)){
            mkdir($this->directory);
            }
        }
    }


    class AD{
        public $host_name;   // SET MANUALLY 
        public $user_name;   // SET MANUALLY 
        public $user_pass;   // SET MANUALLY
        public $db_name;     // SET MANUALLY
        public $column;      // SET MANUALLY
        public $column2;     // SET MANUALLY
        public $column3;     // SET MANUALLY
        public $table_name;  // SET MANUALLY
        public $connection;
        public $query;
        public $result;
        public $row;
        public $ad_title;
        public $ad_link;
        public $ad_picture;
        function connect(){
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->query = "SELECT * FROM `$this->table_name`";
            $this->result = mysqli_query($this->connection , $this->query);
            if(!mysqli_num_rows($this->result)){
                echo "<div class='m-auto ad-image'>";
                echo "  <a href='http://localhost/Simple-CMS/public/contact-us.php' title=''>
                            <center>
                                <img class='ad-image' src='src/images/ad.jpg' />
                            </center>
                        </a>";
                echo "</div>";
            }else{
                while($this->row = mysqli_fetch_assoc($this->result)){
                    $this->ad_title = $this->row[$this->column];
                    $this->ad_link =$this->row[$this->column2];
                    $this->ad_picture = $this->row[$this->column3];
                    echo "<div class='m-auto ad-image' style='width:500px;height:75px;'>";
                    echo "  <a href='" . $this->ad_link . "' title='" . $this->ad_title . "'>
                                <img src='" . $this->ad_picture . "'/>
                            </a>";
                    echo "</div>";
                }
            }
        }
    }

    
    class VISITS{
        public $host_name;   // SET MANUALLY 
        public $user_name;   // SET MANUALLY
        public $user_pass;   // SET MANUALLY
        public $db_name;     // SET MANUALLY
        public $column;      // SET MANUALLY
        public $table_name;  // SET MANUALLY
        public $connection;
        public $query;
        public $result;
        public $row;
        public $visitN;
        public $query2;
        public $result2;
        function connect(){
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->query = "SELECT `$this->column` FROM `$this->table_name` WHERE id=1 LIMIT 1";
            $this->result = mysqli_query($this->connection , $this->query);
            if($this->result){
                while($this->row = mysqli_fetch_assoc($this->result)){
                    $this->visitN = $this->row[$this->column];
                    ++$this->visitN;
                    $this->query2 = "UPDATE `$this->table_name` SET `$this->column` = $this->visitN WHERE `id`=1";
                    $this->result2 = mysqli_query($this->connection , $this->query2);
                }
            }
        }
    }
    class CALENDAR{
        function show(){
            require "src/includes/jdf.php";
            echo jdate('Y/m/d' , '' , '' , 'Asia/Tehran' , 'en');
        }
    }


    class MENU{
        public $host_name;   // SET MANUALLY
        public $user_name;   // SET MANUALLY
        public $user_pass;   // SET MANUALLY
        public $db_name;     // SET MANUALLY
        public $table_name;  // SET MANUALLY
        public $column_title;
        public $column_href;
        public $connection;
        public $query;
        public $result;
        public $row;
        public $title;
        public $href;
        function connect(){
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->query = "SELECT * FROM `$this->table_name`";
            $this->result = mysqli_query($this->connection , $this->query);
            while($this->row = mysqli_fetch_assoc($this->result)){
                $this->title = $this->row[$this->column_title];
                $this->href = $this->row[$this->column_href];
                echo "<a class='text-gray-600 my-12 mx-4 menu-button' href=$this->href title=$this->title>$this->title</a> ";
            }
        }
    }


    class IP{
        public $client;
        public $forward;
        public $remote;
        public $ip;
        function getUserIP(){
            $this->client  = @$_SERVER['HTTP_CLIENT_IP'];
            $this->forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $this->remote  = $_SERVER['REMOTE_ADDR'];
    
            if(filter_var($this->client, FILTER_VALIDATE_IP))
            {
                $this->ip = $this->client;
            }
            elseif(filter_var($this->forward, FILTER_VALIDATE_IP))
            {
                $this->ip = $this->forward;
            }
            else
            {
                $this->ip = $this->remote;
            }
    
            return $this->ip;
        }
    }


    class SIGNUP{
        private $host_name;
        private $user_name;
        private $user_pass;
        private $db_name;
        private $table_name;
        private $connection;
        private $signup_date;
        private $query;
        private $result;
        private $hash_F;
        private $salt;
        private $hash_salt;
        public $email;
        public $password;
        public $phonenumber;
        private function connect(){
            require "src/includes/jdf.php";
            $this->signup_date = jdate('Y/m/d g:i:a a' , '' , '' , 'Asia/Tehran' , 'en');
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name = 'users';
            $this->table_name = 'users';
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->email = mysqli_real_escape_string($this->connection , $this->email);
            $this->email = strtolower($this->email);
            $this->password = mysqli_real_escape_string($this->connection , $this->password);
            $this->hash = '$5$';
            $this->salt = 'sixteencharacter';
            $this->hash_salt = $this->hash . $this->salt;
            $this->password = crypt($this->password , $this->hash_salt);
            $this->query = "INSERT INTO `$this->table_name`(email , password , phonenumber) VALUES('$this->email' , '$this->password' , '$this->phonenumber')";
            $this->result = mysqli_query($this->connection , $this->query);
            if($this->result){
                exit("fuck you!");
            }else{
                exit("fuck you fuck you!");
            }
        }
    }
?>