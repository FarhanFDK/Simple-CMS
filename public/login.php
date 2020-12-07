<?php $title = "شرکت افراگسترنوین-ورود"; ?>
<?php
    class Content{
          public $h;
    }
?>
<?php require "src/includes/classes.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $national_code = $_POST['national_code_final_value'];
        $password = $_POST['password_final_value'];
        if(strlen($national_code) != 10){
            exit("<p style='color:red;'>شماره ملی باید 10 رقم باشد</p>");
        }else{

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
                    <input class="national_code ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" dir="ltr" placeholder="0123456789" id="national_code" name="national_code" style="direction:ltr;font-family:Yekan;" maxlength="10" autocomplete="FALSE"/>
                    <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
                </div>
                <div>
                    <label class="mr-5 text-gray-700 text-l font-bold mb-2 text-none unselectable" for="password">رمزعبور: </label>
                    <input class="password ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" dir="ltr" id="password" name="password" style="direction:ltr;" maxlength="32" autocomplete="FALSE"/>
                    <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور باید بین 8 تا 32 کاراکتر باشد</span></div>
                </div>
                <div class="recaptcha text-center block clear-both m-auto">
                    <div class="g-recaptcha" id="recaptcha" data-callback="recaptcha_changed" data-sitekey="6LckgPAZAAAAAOx7EZxBTqJhB_Nw-g7b3xOL7gGg"></div>
                </div>
                <div class="hidden text-red-700 text-l font-bold mb-2 text-none" id="recaptcha_correct">
                    لطفا گزینه &#34; من ربات نیستم &#34; را علامت بزنید
                </div>
                <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
                <!-- IMPORTANT! -->
                <div>
                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" id="submit" name="submit">ورود</button>
                </div>
                <div>
                    <span class="text-green-700 text-l font-bold text-none" id="response_area"></span>
                    <span class="hidden text-red-700 text-l font-bold mt-8 mb-2 text-none" id="error">فرم را کامل کنید</span>
                </div>
            </form>
        </div>
    </div>
    <noscript class="text-red-700 text-l font-bold mb-2 text-none m-auto" language="javascript">
        مرورگر شما از جاوااسکریپت استفاده نمیکند
        <br>
        لطفا برای جلوگیری از بروز مشکل از مرورگری که از جاوااسکریپت پشتیبانی میکند استفاده کنید
    </noscript>
    <script>

        "use strict"
        let recaptcha_correct = document.getElementById("recaptcha_correct");
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
        function recaptcha_changed(){
            $(recaptcha_correct).fadeOut();
        }

        document.getElementById("submit").onclick = function (){
            let national_code_value = document.getElementById("national_code").value;
            let password_value = document.getElementById("password").value;
            let response = document.getElementById("g-recaptcha-response").value;
            let number = 0;
            let os = getOS();
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

            if(response !== ""){
                $(recaptcha_correct).fadeOut();
                number++;
            }else{
                $(recaptcha_correct).fadeIn();
            }

            if(number == 3){
                let number_final_dec = 0;
                if(national_code_value.length < 10){
                    $(national_code_blur).fadeIn();
                }else{
                    number_final_dec++;
                }

                if(password_value.length < 8){
                    $(password_blur).fadeIn();
                }else{
                    number_final_dec++;
                }

                if(response !== ""){
                    number_final_dec++;
                    $(recaptcha_correct).fadeOut();
                }else{
                    $(recaptcha_correct).fadeIn();
                }

                if(number_final_dec == 3){
                    let secret = "6LckgPAZAAAAAMu2c0GUv4ZNGhliiY3W8xoi4x0d";
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
                    xmlhttp.send("submit=1&national_code_final_value=" + national_code_final_value + "&password_final_value=" + password_final_value + "&secret=" + secret + "&response=" + response + "&login_system_os=" + os);

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
