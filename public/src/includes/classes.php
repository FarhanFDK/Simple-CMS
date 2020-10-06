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
                echo "<div class='m-auto' style='width:500px;height:75px;'>";
                echo "  <a href='http://localhost/Simple-CMS/public/contact-us.php' title=''>
                            <img src='src/images/ad.jpg' />
                        </a>";
                echo "</div>";
            }else{
                while($this->row = mysqli_fetch_assoc($this->result)){
                    $this->ad_title = $this->row[$this->column];
                    $this->ad_link =$this->row[$this->column2];
                    $this->ad_picture = $this->row[$this->column3];
                    echo "<div class='m-auto' style='width:500px;height:75px;'>";
                    echo "  <a href='" . $this->ad_link . "' title='" . $this->ad_title . "'>
                                <img src='" . $this->ad_picture . "'/>
                            </a>";
                    echo "</div>";
                }
            }
        }
    }
?>
<?php
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
?>