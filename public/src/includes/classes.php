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
                echo "<a class='text-none text-gray-600 my-12 mx-4 menu-button unselectable' href=$this->href title=$this->title>$this->title</a> ";
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


    class LOGIN{
        private $host_name;
        private $user_name;
        private $user_pass;
        private $db_name;
        private $connection;
        private $login_date;
        private $ipF;
        private $ip;
        private $table_name;
        private $column_name;
        private $query;
        private $result;
        private $hash;
        private $salt;
        private $hash_salt;
        private $cookieName;
        private $cookieValue;
        public $cookie_login;
        public $cookie_login2;
        public $national_code;
        public $email;
        public $password;
        private function connect(){
            require "src/includes/jdf.php";
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name = 'users';
            $this->table_name = 'users_information';
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
            $this->login_date = jdate('Y/m/d g:i:a a' , '' , '' , 'Asia/Tehran' , 'en');
            $this->ipF = NEW IP();
            $this->ip = $this->ipF->getUserIP();
            $this->hash = "$5$";
            $this->salt = "sixteencharacter";
            $this->hash_salt = $this->hash . $this->salt;
            $this->password = crypt($this->hash_salt , $this->password);
            $this->query = "SELECT national_code, password FROM `$this->table_name` WHERE national_code = `$this->national_code` AND password = `$this->password`";
            $this->result = mysqli_query($this->connection , $this->query);
            if(mysqli_num_rows($this->result) == 1){
                ob_start(); // end it here
                setcookie('');
                ob_end_flush();
            }
        }

        private function connect_with_cookie(){
            if($this->cookie_login != "" && $this->cookie_login2 != ""){
                // require "src/includes/jdf.php";
                $this->host_name = 'localhost';
                $this->user_name = 'root';
                $this->user_pass = '';
                $this->db_name = 'users';
                $this->table_name = 'users_information';
                $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
                //$this->login_date = jdate('Y/m/d g:i:a a' , '' , '' , 'Asia/Tehran' , 'en');
                $this->ipF = NEW IP();
                $this->ip = $this->ipF->getUserIP();
                $this->query = "SELECT * FROM `$this->table_name` WHERE `cookie_login` = '$this->cookie_login' AND `cookie_login2` = '$this->cookie_login2'";
                $this->result = mysqli_query($this->connection , $this->query);
                if(mysqli_num_rows($this->result) == 1){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
    class SIGNUP{
        private $host_name;
        private $user_name;
        private $user_pass;
        private $db_name;
        private $table_name;
        private $connection;
        private $query;
        private $query_confirm;
        private $result;
        private $result_confirm;
        private $hash_F;
        private $hash_F_confirm;
        private $salt;
        private $salt_confirm;
        private $hash_salt;
        private $hash_salt_confirm;
        private $signup_date;
        private $signup_ip_pre;
        private $signup_ip;
        private $cookie_login;
        private $random_number_email;
        private $subject;
        private $message;
        private $headers;
        private $url;
        private $secret;
        private $response;
        private $success;
        private $hostname;
        private $time;
        private $array;
        public $firstname;
        public $signup_system_os;
        public $lastname;
        public $national_code;
        // public $phonenumber;
        public $email;
        public $password;
        public $email_ad;
        private function connect(){
            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\SMTP;
            // use PHPMailer\PHPMailer\Exception;
            // require "vendor/phpmailer/autoload.php";
            $this->response = $_POST['response'];
            $this->secret = $_POST['secret'];
            $this->response = $_POST['response'];
            $this->signup_ip_pre = new IP();
            $this->signup_ip = $this->signup_ip_pre->getUserIP();
            $this->url = "https://www.google.com/recaptcha/api/siteverify?" . "secret=" . $this->secret . "&response=" . $this->response . "&remote_ip=" . $this->signup_ip;
            $this->array = json_decode(file_get_contents($this->url) , true);
            $this->success = $this->array['success'];
            if($this->success == true){
                require "src/includes/jdf.php";
                $this->signup_date = jdate('Y/m/d g:i:a a' , '' , '' , 'Asia/Tehran' , 'en');
                $this->host_name = 'localhost';
                $this->user_name = 'root';
                $this->user_pass = '';
                $this->db_name = 'users';
                $this->table_name = 'users_information';
                $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
                if($this->connection == true){
                    $this->national_code = mysqli_real_escape_string($this->connection , $this->national_code);
                    // $this->phonenumber = mysqli_real_escape_string($this->connection , $this->phonenumber);
                    $this->email = mysqli_real_escape_string($this->connection , $this->email);
                    $this->email = strtolower($this->email);
                    $this->query_confirm = "SELECT * FROM `$this->table_name` WHERE `national_code` = '$this->national_code' OR `email` = '$this->email'"; /*phonenumber = $this->phonenumber OR */
                    $this->result_confirm = mysqli_query($this->connection , $this->query_confirm);
                    if(mysqli_num_rows($this->result_confirm) > -1){
                        $this->signup_date = mysqli_real_escape_string($this->connection , $this->signup_date);
                        $this->signup_system_os = mysqli_real_escape_string($this->connection , $this->signup_system_os);
                        $this->signup_ip = mysqli_real_escape_string($this->connection , $this->signup_ip);
                        $this->firstname = mysqli_real_escape_string($this->connection , $this->firstname);
                        $this->lastname = mysqli_real_escape_string($this->connection , $this->lastname);
                        $this->password = mysqli_real_escape_string($this->connection , $this->password);
                        $this->email_ad = mysqli_real_escape_string($this->connection , $this->email_ad);
                        $this->hash_F = '$5$';
                        $this->hash_F_confirm = '$5$';
                        $this->salt = 'sixteencharacter';
                        $this->salt_confirm = 'sixteencharacter';
                        $this->hash_salt = $this->hash_F . $this->salt;
                        $this->hash_salt_confirm = $this->hash_F_confirm . $this->salt_confirm;
                        $this->password = crypt($this->password , $this->hash_salt);
                        $this->random_number_email = rand(121030 , 989090);
                        $this->time = time() + 320;
                        $this->cookie_login = crypt($this->national_code . $this->firstname , $this->hash_salt_confirm);
                        $this->cookie_login = mysqli_real_escape_string($this->connection , $this->cookie_login);
                        //$this->cookie_login2 = crypt($this->national_code . $this->password , $this->hash_salt_confirm);
                        $this->query = "INSERT INTO `$this->table_name`(`id`, `signup_date`, `signup_os`, `signup_ip`, `firstname`, `lastname`, `national_code`, `phonenumber`, `email`, `random_number` , `time` , `password`, `cookie_login`, `email_ad`, `post_code`, `profile_photo`, `login_date`, `login_os`, `login_ip`)";
                        $this->query .= "VALUES(NULL , '$this->signup_date' , '$this->signup_system_os' , '$this->signup_ip' , '$this->firstname' , '$this->lastname' , '$this->national_code' , '' , '$this->email' , '$this->random_number_email' , '$this->time' , '$this->password' , '$this->cookie_login' , '$this->email_ad' , '' , '' , '' , '' , '')";
                        $this->result = mysqli_query($this->connection , $this->query);
                        if($this->result){
                            $_SESSION['firstname'] = $this->firstname;
                            $_SESSION['lastname'] = $this->lastname;
                            $_SESSION['national_code'] = $this->national_code;
                            $_SESSION['email'] = $this->email;
                            // $_SESSION['email_ad'] = $this->email_ad;
                            // $_SESSION['phonenumber'] = $this->phonenumber;
                            /*$this->subject = "تایید ایمیل";
                            $this->message = "
                            <!DOCTYPE html>
                            <html>
                                <head>
                                    <meta charset='UTF-8'>
                                    <title>ایمیل خود را تایید کنید</title>
                                    <style>
                                        @font-face {
                                            font-family: Samim;
                                            src: url('../fonts/samim/Samim.eot');
                                            src: url('../fonts/samim/Samim.eot') format('embedded-opentype'),
                                                 url('../fonts/samim/Samim.woff') format('woff'),
                                                 url('../fonts/samim/Samim.ttf') format('truetype');
                                            font-weight: normal;
                                            /* Samim font 
                                        }
    
                                        body{
                                            font-family:Samim;
                                            text-align:center;
                                            direction:rtl;
                                            font-size:20px;
                                        }
    
                                        #en{
                                            direction:ltr;
                                            font-family:Arial !important;
                                        }
                                    </style>
                                </head>
                                <body>
                                    <div>
    
                                    </div>
                                </body>
                            </html>
                            ";
    
                            // Always set content-type when sending HTML email
                            $this->headers = "MIME-Version: 1.0" . "\r\n";
                            $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
                            // More headers
                            $this->headers .= 'From: <info@afragostarnovin.ir>' . "\r\n";
                            $this->headers .= 'Cc: ' . $this->email . "\r\n";
    
                            mail($this->email,$this->subject,$this->message,$this->headers);
                            // ob_start();
                            // // setcookie($this->cookie_login , $this->cookie_login2 , time() + 86400 , '/' , 'localhost' , false , true);
                            // ob_end_flush();
                            // mail("$this->email" , "شرکت افراگسترنوین");
                            */
                            header("Location: verify-email.php");
                            exit("fuck you");
                        }else{
                            exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد لطفا بعدا تلاش نمایید</p>");
                        }
                    }else{
                        exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>شما قبلا ثبت نام کرده اید</p>");
                    }
    
                }else{
                    exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد</p>");
                }
            }else{
                exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد</p>");
            }
        }
        private function verify_email(){
            $this->host_name = "localhost";
            $this->user_name = "root";
            $this->user_pass = "";
            $this->db_name = "users";
            $this->table_name = "users_information";
            $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);

        }
}

?>
