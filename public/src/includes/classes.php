<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    class SCANNER{
        public $directory;
        public $handle;
        public $entry;
        function connect(){
            if($this->handle = opendir($this->directory)){
                while(false !== ($this->entry = readdir($this->handle))){
                    if($this->entry != "." && $this->entry != "..") {

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
        private $host_name;
        private $user_name;
        private $user_pass;
        private $db_name;
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
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name = 'ads';
            $this->table_name = 'ad_list';
            $this->column = 'ad_title';
            $this->column2 = 'ad_href';
            $this->column3 = 'ad_picture';
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

    # must be static
    class VISITS{  // used!
        private $host_name;   // SET MANUALLY
        private $user_name;   // SET MANUALLY
        private $user_pass;   // SET MANUALLY
        private $db_name;     // SET MANUALLY
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
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name = 'visits';
            $this->column = "visit_number";
            $this->table_name = "visits";
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
            return jdate('Y/m/d' , '' , '' , 'Asia/Tehran' , 'en');
        }
    }


    class MENU{
        private $host_name;
        private $user_name;
        private $user_pass;
        private $db_name;
        private $table_name;
        private $column_title;
        private $column_href;
        private $connection;
        private $query;
        private $result;
        private $row;
        private $title;
        private $href;
        function connect(){
            $this->host_name = 'localhost';
            $this->user_name = 'root';
            $this->user_pass = '';
            $this->db_name = 'MENU';
            $this->table_name = 'list';
            $this->column_title = 'title';
            $this->column_href = 'href';
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
        private $client;
        private $forward;
        private $remote;
        private $ip;
        function getUserIP(){
            $this->client  = @$_SERVER['HTTP_CLIENT_IP'];
            $this->forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $this->remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($this->client, FILTER_VALIDATE_IP)){
                $this->ip = $this->client;
            }

            elseif(filter_var($this->forward, FILTER_VALIDATE_IP)){
                $this->ip = $this->forward;
            }

            else{
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
        private $url;
        private $secret;
        private $response;
        private $success;
        private $time;
        private $array;
        private $mail;
        private $success_mail;
        private $domain;
        private $firstname;
        private $lastname;
        private $grade;
        private $pattern_number;
        private $national_code;
        private $email;
            private $index_length;
            private $index_length2;
            private $index_length_3word_1;
            private $index_length_3word_2;
            private $index_length_3word_3;
            private $index_length_2_2word;
        private $password;
        private $password_confirm;
            private $sp_char;
        private $privacy_policy;
        private $email_ad;
        public $signup_system_os;
        // private $phonenumber;
        function connect(){
            $this->grade = 0;
            $this->pattern_number = '/^\d+$/';
            $this->sp_char = "/[ `!@#$%^&*()_+\-=\[\]{};':\\|,.<>\/?~";
            $this->sp_char .= '"]/';
            $this->firstname = $_POST['firstname'];
            if(strlen($this->firstname) > 2 && strlen($this->firstname) < 26){
                ++$this->grade;
            }

            $this->lastname = $_POST['lastname'];
            if(strlen($this->lastname) > 3 && strlen($this->lastname) < 31){
                ++$this->grade;
            }

            $this->national_code = $_POST['national_code'];
            if(strlen($this->national_code) == 10){
                ++$this->grade;
            }

            if(preg_match($this->pattern_number , $this->national_code)){
                ++$this->grade;
            }


            $this->email = $_POST['email'];

            if(strlen($this->email) > 8 && strlen($this->email) < 41){
                $this->index_length = strlen(strpos($this->email , "@"));
                $this->index_length2 = strlen(strpos($this->email , "."));
                if($this->index_length != 0 && $this->index_length2 != 0){
                    $this->index_length_3word_1 = strlen(substr($this->email , $this->index_length + 1 , 1));
                    if(!($this->index_length_3word_1 == ".")){
                        ++$this->grade;
                    }

                    $this->index_length_3word_2 = strlen(substr($this->email , $this->index_length + 2 , 1));
                    if(!($this->index_length_3word_2 == ".")){
                        ++$this->grade;
                    }

                    $this->index_length_3word_3 = strlen(substr($this->email , $this->index_length + 3 , 1));
                    if(!($this->index_length_3word_3 == ".")){
                        ++$this->grade;
                    }

                    $this->index_length_2_2word = strlen(substr($this->email , $this->index_length2 , 2));
                    if($this->index_length_2_2word == 2){
                        ++$this->grade;
                    }
                }
            }

            /*$phonenumber = $_POST['phonenumber_final_value'];

            if(strlen($phonenumber) == 11){
                ++$this->grade;
            }

            if(preg_match($pattern_number , $phonenumber)){
                ++$this->grade;
            }*/

            $this->password = $_POST['password'];
            $this->password_confirm = $_POST['password'];
            if($this->password_confirm == $this->password){
                ++$this->grade;
            }

            if(strlen($this->password) > 7 && strlen($this->password) < 33){
                ++$this->grade;
            }

            if(preg_match("/[a-z]/i" , $this->password)){
                ++$this->grade;
            }

            if(preg_match("/[A-Z]/" , $this->password)){
                ++$this->grade;
            }

            if(preg_match("~[0-9]+~" , $this->password)){
                ++$this->grade;
            }

            if(preg_match($this->sp_char , $this->password)){
                ++$this->grade;
            }
            $this->privacy_policy = $_POST['privacy'];
            $this->email_ad = $_POST['request_for_email'];
            if($this->privacy_policy == true){
                ++$this->grade;
            }
            $this->signup_system_os = $_POST['signup_system_os'];
            if ($this->grade == 15) {
                require 'vendor/autoload.php';
                $this->response = $_POST['g-recaptcha-response'];
                $this->secret = "6LckgPAZAAAAAMu2c0GUv4ZNGhliiY3W8xoi4x0d";
                $this->signup_ip_pre = new IP();
                $this->signup_ip = $this->signup_ip_pre->getUserIP();
                $this->url = "https://www.google.com/recaptcha/api/siteverify?" . "secret=" . $this->secret . "&response=" . $this->response . "&remote_ip=" . $this->signup_ip;
                $this->array = json_decode(file_get_contents($this->url), true);
                $this->success = $this->array['success'];
                $this->domain = $this->array['hostname'];
                if ($this->success == true && $this->domain == "localhost") { // DD
                    require "src/includes/jdf.php";
                    $this->signup_date = jdate('Y/m/d g:i:a a', '', '', 'Asia/Tehran', 'en');
                    $this->host_name = 'localhost';
                    $this->user_name = 'root';
                    $this->user_pass = '';
                    $this->db_name = 'users';
                    $this->table_name = 'users_information';
                    $this->connection = mysqli_connect($this->host_name, $this->user_name, $this->user_pass, $this->db_name);
                    if ($this->connection == true) {
                        $this->national_code = mysqli_real_escape_string($this->connection, $this->national_code);
                        // $this->phonenumber = mysqli_real_escape_string($this->connection , $this->phonenumber);
                        $this->email = mysqli_real_escape_string($this->connection, $this->email);
                        $this->email = strtolower($this->email);
                        $this->query_confirm = "SELECT * FROM `$this->table_name` WHERE `national_code` = '$this->national_code' OR `email` = '$this->email'"; /*phonenumber = $this->phonenumber OR */
                        $this->result_confirm = mysqli_query($this->connection, $this->query_confirm);
                        if (mysqli_num_rows($this->result_confirm) > -1) {
                            $this->signup_date = mysqli_real_escape_string($this->connection, $this->signup_date);
                            $this->signup_system_os = mysqli_real_escape_string($this->connection, $this->signup_system_os);
                            $this->signup_ip = mysqli_real_escape_string($this->connection, $this->signup_ip);
                            $this->firstname = mysqli_real_escape_string($this->connection, $this->firstname);
                            $this->lastname = mysqli_real_escape_string($this->connection, $this->lastname);
                            $this->password = mysqli_real_escape_string($this->connection, $this->password);
                            $this->email_ad = mysqli_real_escape_string($this->connection, $this->email_ad);
                            $this->hash_F = '$5$';
                            $this->hash_F_confirm = '$5$';
                            $this->salt = 'sixteencharacter';
                            $this->salt_confirm = 'sixteencharacter';
                            $this->hash_salt = $this->hash_F . $this->salt;
                            $this->hash_salt_confirm = $this->hash_F_confirm . $this->salt_confirm;
                            $this->password = crypt($this->password, $this->hash_salt);
                            $this->random_number_email = rand(121030, 989090);
                            $this->time = time() + 320;
                            $this->cookie_login = crypt($this->national_code . $this->firstname, $this->hash_salt_confirm);
                            $this->cookie_login = mysqli_real_escape_string($this->connection, $this->cookie_login);
                            //$this->cookie_login2 = crypt($this->national_code . $this->password , $this->hash_salt_confirm);
                            $this->query = "INSERT INTO `$this->table_name`(`id`, `signup_date`, `signup_os`, `signup_ip`, `firstname`, `lastname`, `national_code`, `phonenumber`, `email`, `verified` , `random_number` , `time` , `password`, `cookie_login`, `email_ad`, `post_code`, `profile_photo`, `login_date`, `login_os`, `login_ip`)";
                            $this->query .= "VALUES(NULL , '$this->signup_date' , '$this->signup_system_os' , '$this->signup_ip' , '$this->firstname' , '$this->lastname' , '$this->national_code' , '' , '$this->email' , 'false' , '$this->random_number_email' , '$this->time' , '$this->password' , '$this->cookie_login' , '$this->email_ad' , '' , '' , '' , '' , '')";
                            $this->result = mysqli_query($this->connection, $this->query);
                            if ($this->result) {
                                // $_COOKIE['email_ad'] = $this->email_ad;
                                // $_COOKIE['phonenumber'] = $this->phonenumber;
                                $this->mail = new PHPMailer(true);
                                try {
                                    $this->mail->CharSet = 'UTF-8';
                                    $this->mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                    $this->mail->isSMTP();                                            // Send using SMTP
                                    $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                    $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                    $this->mail->Username   = 'farhanabdollahiab@gmail.com';                     // SMTP username
                                    $this->mail->Password   = '';  //                              // SMTP password
                                    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                    $this->mail->Port       = 587;
                                    $this->mail->setFrom('farhanabdollahi@afragostarnovin.ir', 'Afragostarnovin Company');
                                    $this->mail->addAddress($this->email, $this->firstname . " " . $this->lastname);     // Add a recipient
                                    $this->mail->addCC('farhanabdollahi@gmail.com');
                                    $this->mail->addBCC('farhanabdollahi@gmail.com');
                                    $this->mail->isHTML(true);  // Set email format to HTML
                                    $this->mail->Subject = 'تایید ایمیل';
                                    $this->mail->Body = '
                                                            <!DOCTYPE html>
                                                            <html>
                                                                <head>
                                                                    <meta charset="UTF-8">
                                                                    <title></title>
                                                                    <style></style>
                                                                </head>
                                                                <body>
                                                                    <header>
                                                                    </header>
                                                                    <div>

                                                                    </div>
                                                                    <footer>
                                                                    </footer>
                                                                </body>
                                                            </html>
                                                        ' . $this->random_number_email;
                                    $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    $this->mail->send();
                                    $this->success_mail = "true";
                                } catch (Exception $e) {
                                    exit("<p class='text-red-700 text-none text-xl font-bold'>ارتباط موفقیت آمیز نبود</p>");
                                }
                                if ($this->success_mail == "true"){
                                    $_SESSION["time"] = $this->time;
                                    $_SESSION["firstname"] = $this->firstname;
                                    $_SESSION["lastname"] = $this->lastname;
                                    $_SESSION["national_code"] = $this->national_code;
                                    $_SESSION["email"] = $this->email;
                                    header("Location: verify-email.php");
                                } else {
                                    exit("false");
                                }
                                // ob_start();
                                // setcookie($this->cookie_login , $this->cookie_login2 , time() + 86400 , '/' , 'localhost' , false , true); // all must be true
                                // ob_end_flush();
                            } else {
                                exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد لطفا بعدا تلاش نمایید</p>");
                            }
                        } else {
                            exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>شما قبلا ثبت نام کرده اید</p>");
                        }
                    } else {
                        exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد</p>");
                    }
                } else {
                    exit("<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد</p>");
                }
            }else{
                session_start();
                $_SESSION['error'] = "<p class='text-red-700 text-none mb-2 text-xl font-bold'>ارتباط با سرور با مشکل مواجه شد</p>";
                header("Location: signup.php");
            }
        }
}
class VERIFY_EMAIL{
    private $host_name;
    private $user_name;
    private $user_pass;
    private $db_name;
    private $table_name;
    private $connection;
    private $sql;
    private $sql2;
    private $firstname;
    private $lastname;
    private $national_code;
    private $email;
    private $number;
    private $time;
    private $row;
    private $result;
    private $result2;
    function verify(){
        $this->host_name = 'localhost';
        $this->user_name = 'root';
        $this->user_pass = '';
        $this->db_name = 'users';
        $this->table_name = 'users_information';
        $this->connection = mysqli_connect($this->host_name , $this->user_name , $this->user_pass , $this->db_name);
        $this->firstname = $_SESSION['firstname'];
        $this->lastname = $_SESSION['lastname'];
        $this->national_code = $_SESSION['national_code'];
        $this->email = $_SESSION['email'];
        $this->time = $_SESSION['time'];
        $this->number = $_POST['number'];
        $this->sql = "SELECT `national_code` , `firstname` , `lastname` , `email` , `time` , `random_number` FROM `$this->table_name` WHERE `firstname` = '$this->firstname' AND `lastname` = '$this->lastname' AND `national_code` = '$this->national_code' AND `email` = '$this->email' AND `random_number` = '$this->number' LIMIT 1";
        $this->result = mysqli_query($this->connection , $this->sql);
        if(mysqli_num_rows($this->result)){
            $this->row = mysqli_fetch_assoc($this->result);
            if($this->row['time'] > time()){
                $this->sql2 = "UPDATE `$this->table_name` SET `verified` = 'true' WHERE `email` = '$this->email' AND `national_code` = '$this->national_code' LIMIT 1";
                $this->result2 = mysqli_query($this->connection , $this->sql2);
                if($this->result2){
                    session_unset();
                    session_destroy();
                    exit("<span class='text-green-600 font-bold text-xl'>ایمیل شما تایید شد</span>");
                }else{
                    exit("<span class='text-red-600 font-bold text-xl'>ارتباط با سرور امکان پذیر نبود لطفا بعدا تلاش نمایید</span>");
                }
            }else{
                exit("<span class='font-b text-none text-red-700'>کد منقضی شده است.لطفا دکمه ارسال دوباره را کلیک کنید</span>");
            }
               
        }
    }
}
?>
