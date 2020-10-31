<?php require "src/includes/classes.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $national_code = $_POST['national_code_final_value'];
        $password = $_POST['password_final_value'];
        if(strlen($national_code) != 10 && (strlen($password) > 32 && strlen($password) < 8)){
            exit("<p style='color:red;'>شماره ملی باید 10 رقم باشد</p>");
        }else{
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
                public $national_code;
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
                    $this->query = "SELECT national_code, password FROM `$table_name` WHERE national_code = `$this->national_code` AND password = `$this->password`";
                    $this->result = mysqli_query($this->connection , $this->query);
                    if(mysqli_num_rows($result) = 1){
                        ob_start(); // end it here
                        setcookie('');
                        ob_end_flush();
                    }
                }
            }
        }
    }
?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
    <div class="middle mtop">
        <div>
            <form class="text-center">
                <div>
            				<label class="text-gray-700 text-l font-bold mb-2 text-none unselectable" for="national_code">شماره ملی: </label>
            				<input class="national_code ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" dir="ltr" id="national_code" name="national_code" style="direction:ltr;" maxlength="10" autocomplete="FALSE" required="true"/>
            				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
                </div>
                <div>
            				<label class="mr-5 text-gray-700 text-l font-bold mb-2 text-none unselectable" for="password">رمزعبور: </label>
            				<input class="password ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" dir="ltr" id="password" name="password" style="direction:ltr;" maxlength="32" autocomplete="FALSE" required="true"/>
            				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور باید بین 8 تا 32 کاراکتر باشد</span></div>
                </div>
                <div>
    				        <input class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" id="submit" name="submit" value="ثبت نام" />
    			      </div>
                <div>
                    <span class="text-green-700 text-l font-bold text-none" id="response_area"></span>
                    <span class="hidden text-red-700 text-l font-bold mt-8 mb-2 text-none" id="error">فرم را کامل کنید</span>
                </div>
            </form>
        </div>
    </div>
    <script>

        "use strict"

        let national_code_blur = document.getElementById("national_code_blur");
        let password_blur = document.getElementById("password_blur");
        document.getElementById("national_code").onblur = function (){
            let national_code_onblur = document.getElementById("national_code").value.length;
            if(national_code_onblur < 10){
                $(national_code_blur).fadeIn();
            }else{
                $(national_code_blur).fadeOut();
            }
        }
        document.getElementById("password").onblur = function (){
            let password_onblur = document.getElementById("password").value.length;
            if(password_onblur < 8){
                $(password_blur).fadeIn();
            }else{
                $(password_blur).fadeOut();
            }
        }

        document.getElementById("national_code").onkeypress = function (e){
            let key = e.which ? e.which : e.keyCode;
            // alert(key)
            // 48 to 57
            if(!(key > 47 && key < 58) && !(key == 13) && !(key > 37 && key < 41) && !(key == 9) && !(key == 16) && !(key == 20)){
                e.preventDefault();
            }
        }

        document.getElementById("national_code").onkeyup = function (){
            let national_code_onkeyup = document.getElementById("national_code").value.length;
            if(national_code_onkeyup > 9){
                $(national_code_blur).fadeOut();
            }
        }

        document.getElementById("password").onkeyup = function (){
            let password_onkeyup = document.getElementById("password").value.length;
            if(password_onkeyup > 7){
                $(password_blur).fadeOut();
            }
        }

        document.getElementById("submit").onclick = function (){
            let national_code_value = document.getElementById("national_code").value;
            let password_value = document.getElementById("password").value;
            let number = 0;
            if(national_code_value.length < 10){
                $(national_code_blur).fadeIn()
            }else{
                number++;
            }
            if(password_value.length < 8){
                $(password_blur).fadeIn();
            }else{
                number++;
            }

            if(number == 2){
                if(national_code_value.length < 10){
                    $(national_code_blur).fadeIn();
                    number--;
                }else{
                    number++;
                }
                if(password_value.length < 8){
                    $(password_blur).fadeIn();
                    number--;
                }else{
                    number++;
                }

                if(number == 4){
                    let national_code_final_value = document.getElementById("national_code").value;
                    let password_final_value = document.getElementById("password").value;
                    // ajax
                    let xmlhttp;
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }else{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    xmlhttp.open("POST" , "login.php" , true);
                    xmlhttp.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
                    xmlhttp.send("submit=1&national_code_final_value=" + national_code_final_value + "&password_final_value=" + password_final_value);

                    xmlhttp.onreadystatechange = function (){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementById("response_area").innerHTML = this.responseText;
                        }
                    };
                }
            }else{
                document.getElementById("error").fadeIn();
            }
        }
    </script>
<?php require "src/includes/footer.php"; ?>
