<?php $title = "شرکت افراگسترنوین-ثبت نام"; ?>
<?php
    class Content{
        public $h;
    }
?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname_final_value'];
        $grade = 0;
        $pattern_number = '/^\d+$/';
        if(strlen($firstname) > 2 && strlen($firstname) < 26){
            $grade++;
        }

        $lastname = $_POST['lastname_final_value'];

        if(strlen($lastname) > 3 && strlen($lastname) < 31){
            ++$grade;
        }

        $national_code = $_POST['national_code_final_value'];

        if(strlen($national_code) == 10){
            ++$grade;
        }

        if(preg_match($pattern_number , $national_code)){
            ++$grade;
        }

        /*$phonenumber = $_POST['phonenumber_final_value'];

        if(strlen($phonenumber) == 11){
            ++$grade;
        }

        if(preg_match($pattern_number , $phonenumber)){
            ++$grade;
        }*/

        $email = $_POST['email_final_value'];

        if(strlen($email) > 8 && strlen($email) < 41){
            $index_length = strlen(strpos($email , "@"));
            $index_length2 = strlen(strpos($email , "."));
            if($index_length != 0 && $index_length2 != 0){
                $index_length_3word_1 = strlen(substr($email , $index_length + 1 , 1));
                if(!($index_length_3word_1 == ".")){
                    ++$grade;
                }

                $index_length_3word_2 = strlen(substr($email , $index_length + 2 , 1));
                if(!($index_length_3word_2 == ".")){
                    ++$grade;
                }

                $index_length_3word_3 = strlen(substr($email , $index_length + 3 , 1));
                if(!($index_length_3word_3 == ".")){
                    ++$grade;
                }

                $index_length_2_2word = strlen(substr($email , $index_length2 , 2));
                if($index_length_2_2word == 2){
                    ++$grade;
                }
            }
        }

        $password = $_POST['password_final_value'];
        $password_confirm = $_POST['password_confirm_final_value'];
        if($password_confirm == $password){
            ++$grade;
        }

        if(strlen($password) > 7 && strlen($password) < 33){
            ++$grade;
        }

        if(preg_match("/[a-z]/i" , $password)){
            ++$grade;
        }

        if(preg_match("/[A-Z]/" , $password)){
            ++$grade;
        }

        if(preg_match("~[0-9]+~" , $password)){
            ++$grade;
        }

        $sp_char = "/[ `!@#$%^&*()_+\-=\[\]{};':\\|,.<>\/?~";
        $sp_char .= '"]/';
        if(preg_match($sp_char , $password)){
            ++$grade;
        }

        $privacy_policy = $_POST['privacy_policy_final_value'];
        $request_for_email = $_POST['request_for_email'];
        if($privacy_policy == true){
            ++$grade;
        }
        $signup_os = $_POST['signup_system_os'];
        if($grade == 15){
            $connect_signup = new SIGNUP();
            $connect_signup->firstname = $firstname;
            $connect_signup->lastname = $lastname;
            $connect_signup->national_code = $national_code;
            // $connect_signup->phonenumber = $phonenumber;
            $connect_signup->email = $email;
            $connect_signup->password = $password;
            $connect_signup->email_ad = $request_for_email;
            $connect_signup->signup_system_os = $signup_os;
            $connect_signup->secret = $_POST['secret'];
            
            $reflector = new ReflectionObject($connect_signup);
            $method = $reflector->getMethod('connect');
            $method->setAccessible(true);

            if($method->invoke($connect_signup) == true){

            }
        }else{
            exit("<div class='text-red-700 text-xl text-none mb-2 font-bold'></div>");
        }
    }
    ?>
<div class="scroll scroll-width-thin"></div>
<div class="middle mtop">
    <div>
        <form class="text-center unselectable">
            <div>
                <div>لطفا اطلاعات خود را جهت ثبت نام در سایت شرکت افراگستر نوین وارد نموده و گزینه ثبت نام را کلیک کنید</div>
                <div class="block sm:block md:block lg:flex xl:flex flex-none sm:flex-none md:flex-row lg:flex-row xl:flex-row w-full">
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mr-0 sm:mr-0 md:mr-0 lg:mr-2 xl:mr-2">
                        <label class="mr-12 text-gray-700 text-l mr-3 sm:mr-3 md:mr-3 lg:mr-20 xl:mr-20 font-bold mb-2 text-none" for="firstname">نام: </label><span class="text-red-700">*</span>
                        <input class="firstname w-1/2 my-4 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstname" name="firstname" maxlength="25" placeholder="علی" autocomplete="FALSE"/>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-24 xl:mr-24 text-red-700 text-l font-bold mb-2 text-none" id="firstname_blur">نام باید بین 3 تا 25 کاراکتر باشد</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-24 xl:mr-24 text-red-700 text-l font-bold mb-2 text-none" id="firstname_blur_lang">لطفا به فارسی تایپ کنید</span></div>
                    </div>
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 ml-20">
                        <label class="text-gray-700 text-l font-bold mb-2 text-none" for="lastname">نام خانوادگی: </label><span class="text-red-700">*</span>
                        <input class="lastname w-1/2 ml-12 sm:ml-12 my-4 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="lastname" name="lastname" maxlength="30" placeholder="امیری" autocomplete="FALSE"/>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-12 xl:mr-12 text-red-700 text-l font-bold mb-2 text-none" id="lastname_blur">نام خانوادگی باید بین 4 تا 30 کاراکتر باشد</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-16 xl:mr-16 text-red-700 text-l font-bold mb-2 text-none" id="lastname_blur_lang">لطفا به فارسی تایپ کنید</span></div>
                    </div>
                </div>
                <div class="block sm:block md:block lg:flex xl:flex flex-none sm:flex-none md:flex-row lg:flex-row xl:flex-row">
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mr-0 sm:mr-0 md:mr-0 lg:mr-2 xl:mr-2">
                        <label class="mr-4 text-gray-700 text-l mr-4 sm:mr-4 md:mr-4 lg:mr-20 xl:mr-20 font-bold mb-2 text-none" for="national_code">شماره ملی: </label><span class="text-red-700">*</span>
                        <input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="0123456789" type="text" id="national_code" name="national_code" maxlength="10" style="direction:ltr;font-family:yekan;" autocomplete="FALSE"/>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-20 xl:mr-20 text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-20 xl:mr-20 text-red-700 text-l font-bold mb-2 text-none" id="national_code_correct">لطفا به عدد لاتین تایپ کنید</span></div>
                    </div>
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 ml-20">
                        <!--
                        <label class="mr-1 text-gray-700 text-l font-bold mb-2 text-none" for="phonenumber">شماره همراه: </label><span class="text-red-700">*</span>
                        <input class="phonenumber ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="09123456789" type="text" id="phonenumber" name="phonenumber" style="direction:ltr;font-family:yekan;" maxlength="11" maxlength="15" autocomplete="FALSE"/>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-12 xl:mr-12 text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_blur">شماره همراه باید 11 رقم باشد</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-12 xl:mr-12 text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_correct">لطفا شماره تلفن را درست وارد کنید</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-12 xl:mr-12 text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_correct_number">لطفا به عدد لاتین تایپ کنید</span></div>
                        -->
                        <label class="text-gray-700 text-l font-bold mb-2 text-none" for="email">ایمیل: </label><span class="text-red-700">*</span>
                        <input class="my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email" placeholder="Ali.Amiri@example.com" style="direction:ltr;" maxlength="40" autocomplete="FALSE"/>
                        <div><span class="hidden text-red-700 mr-5 sm:mr-5 md:mr-5 lg:mr-20 xl:mr-20 text-l font-bold mb-2 text-none" id="email_blur">ایمیل باید بین 9 تا 40 کاراکتر باشد</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-20 xl:mr-20 text-red-700 text-l font-bold mb-2 text-none" id="email_correct">لطفا ایمیل را درست وارد کنید</span></div>
                        <div><span class="hidden mr-5 sm:mr-5 md:mr-5 lg:mr-20 xl:mr-20 text-red-700 text-l font-bold mb-2 text-none" id="email_correct_type">فقط اعداد،حروف لاتین،نقطه و کاراکتر @ مجاز است</span></div>
                    </div>
                </div>
                <div class="block sm:block md:block lg:hidden xl:hidden" id="scroller_password"></div>
                <div class="block sm:block md:block lg:flex xl:flex flex-none sm:flex-none md:flex-row lg:flex-row xl:flex-row">
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mr-0 sm:mr-0 md:mr-0 lg:mr-10 xl:mr-10">
                        <label class="text-gray-700 text-l font-bold mb-2 mr-2" for="password">رمز عبور: </label><span class="text-red-700">*</span>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="ml-4 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" maxlength="32" autocomplete="FALSE"/>
                    </div>
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 ml-20">
                        <label class="text-gray-700 text-l font-bold mb-2" for="password_confirm">تایید رمز عبور: </label><span class="text-red-700">*</span>
                        <input class="ml-16 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirm" name="password_confirm" maxlength="32" autocomplete="FALSE"/>
                        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور همخوانی ندارد</span></div>
                    </div>
                </div>
                <div style="direction:ltr;">
                    <div id="strength_text">

                    </div>
                    <meter class="meter meter-red" max="100" id="strength" value="0"></meter>
                </div>
                <div class="hidden mb-8" id="validation_password">
                    <div>رعایت موارد زیر در مورد رمزعبور الزامی است</div>
                    <div id="A_to_Z" style="color:red;">دارای حداقل یک حرف بزرگ</div>
                    <div id="a_to_z" style="color:red;">دارای حداقل یک حرف کوچک</div>
                    <div id="number8" style="color:red;">دارای حداقل یک عدد</div>
                    <div id="char8" style="color:red;">دارای حداقل هشت کاراکتر</div>
                    <div id="special_char8" style="color:red;">دارای حداقل یک کاراکتر خاص</div>
                </div>
                <div class="recaptcha text-center block clear-both m-auto">
                    <div class="g-recaptcha" id="recaptcha" data-sitekey="6LckgPAZAAAAAOx7EZxBTqJhB_Nw-g7b3xOL7gGg"></div>
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <!-- IMPORTANT! -->
                <div>
                    <div>
                        <input class="ml-2 cursor-pointer" type="checkbox" id="privacy_policy" name="privacy_policy" />
                        <label class="text-gray-700 text-l font-bold mb-2" for="privacy_policy"><a class="text-blue-400" href="policy.php" title="" target="_blank">شرایط</a> را خوانده و قبول دارم</label><span class="text-red-700">*</span>
                    </div>
                    <div>
                        <input class="ml-2 cursor-pointer" type="checkbox" id="requests" name="requests" />
                        <label class="text-gray-700 text-l font-bold mb-2" for="requests">مایل به دریافت ایمیل هستم</label>
                    </div>
                </div>
                <div id="form_is_not_correct" class="hidden mt-10 text-red-700 text-l font-bold mb-2 text-none">
                    لطفا فیلدها را کامل کنید
                </div>
                <div id="response_area" style="user-select:all !important;">

                </div>
                <div>
                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" id="submit" name="submit">ثبت نام</button>
                </div>
                <noscript class="text-red-700 text-l font-bold mb-2 text-none m-auto" language="javascript">
                    مرورگر شما از جاوااسکریپت استفاده نمیکند
                    <br>
                    لطفا برای جلوگیری از بروز مشکل از مرورگری که از جاوااسکریپت پشتیبانی میکند استفاده کنید
                </noscript>
            </div>
        </form>
    </div>
</div>
<script>
    "use strict"
    let firstname_selection = document.getElementById("firstname");
    let lastname_selection = document.getElementById("lastname");
    let national_code_selection = document.getElementById("national_code");
    // let phonenumber_selection = document.getElementById("phonenumber");
    let email_selection = document.getElementById("email");
    let password_selection = document.getElementById("password");
    let password_confirm_selection = document.getElementById("password_confirm");
    let submit_selection = document.getElementById("submit");
    let privacy_policy_selection = document.getElementById("privacy_policy");
    let email_requests_selection = document.getElementById("requests");
    let fisrtname_blur = document.getElementById("firstname_blur");
    let firstname_blur_lang = document.getElementById("firstname_blur_lang");
    let lastname_blur = document.getElementById("lastname_blur");
    let lastname_blur_lang = document.getElementById("lastname_blur_lang");
    let national_code_blur = document.getElementById("national_code_blur");
    let national_code_correct = document.getElementById("national_code_correct");
    /*let phonenumber_blur = document.getElementById("phonenumber_blur");
    let phonenumber_correct = document.getElementById("phonenumber_correct");
    let phonenumber_correct_number = document.getElementById("phonenumber_correct_number");*/
    let privacy_policy_onsubmit = document.getElementById("privacy_policy_onsubmit");
    let email_blur = document.getElementById("email_blur");
    let password_blur = document.getElementById("password_blur");
    let validation_password = document.getElementById("validation_password");
    let form_is_not_correct = document.getElementById("form_is_not_correct");
    let recaptcha = document.getElementById("recaptcha");
    let strength_text = document.getElementById("strength_text");
    let pattern1 = /[a-z]+/;
    let pattern2 = /[A-Z]+/;
    let pattern3 = /[0-9]+/;
    let pattern4 = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]+/;
    let pattern_persian = /^[\u0600-\u06FF\s]+$/;
    let pattern_number = /^\d+$/;
    firstname_selection.onblur = function (){
        let firstname_onblur = firstname_selection.value;
        if(firstname_onblur.length < 3 || firstname_onblur.length > 25){
            $(firstname_blur).fadeIn();
        }else{
            $(firstname_blur).fadeOut();
            if(pattern_persian.test(firstname_onblur) == true){
              $(firstname_blur_lang).fadeOut();
            }else{
              $(firstname_blur_lang).fadeIn();
            }
        }

    }

    firstname_selection.onkeyup = function (){
        let firstname_onkeyup = firstname_selection.value;
        if(firstname_onkeyup.length > 2 && firstname_onkeyup.length < 26){
            $(firstname_blur).fadeOut();
            if(pattern_persian.test(firstname_onkeyup) == true){
              $(firstname_blur_lang).fadeOut();
            }else{
              $(firstname_blur_lang).fadeIn();
            }
        }
    }

    firstname_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            e.preventDefault();
            $(firstname_blur_lang).fadeIn();
        }else{
            $(firstname_blur_lang).fadeOut();
        }

    }

    lastname_selection.onblur = function (){
        let lastname_onblur = lastname_selection.value;
        if(lastname_onblur.length < 4 || lastname_onblur.length > 30){
            $(lastname_blur).fadeIn();
        }else{
            $(lastname_blur).fadeOut();
            if(pattern_persian.test(lastname_onblur) == true){
              $(lastname_blur_lang).fadeOut();
            }else{
              $(lastname_blur_lang).fadeIn();
            }
        }
    }

    lastname_selection.onkeyup = function (){
        let lastname_onkeyup = lastname_selection.value;
        if(lastname_onkeyup.length > 3 && lastname_onkeyup.length < 31){
            $(lastname_blur).fadeOut();
            if(pattern_persian.test(lastname_onkeyup) == true){
              $(lastname_blur_lang).fadeOut();
            }else{
              $(lastname_blur_lang).fadeIn();
            }
        }
    }

    lastname_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            e.preventDefault();
            $(lastname_blur_lang).fadeIn();
        }else{
            $(lastname_blur_lang).fadeOut();
        }
    }

    national_code_selection.onblur = function (){
        let national_code_onblur = national_code_selection.value;
        if(!(national_code_onblur.length == 10)){
            $(national_code_blur).fadeIn();
        }else{
            $(national_code_blur).fadeOut();
            if(pattern_number.test(national_code_onblur) == true){
              $(national_code_correct).fadeOut();
            }else{
              $(national_code_correct).fadeIn();
            }
        }

    }

    national_code_selection.onkeyup = function (){
        let national_code_onkeyup = national_code_selection.value;
        if(national_code_onkeyup.length > 9 && national_code_onkeyup.length < 11){
            $(national_code_blur).fadeOut();
            if(pattern_number.test(national_code_onkeyup) == true){
              $(national_code_correct).fadeOut();
            }else{
              $(national_code_correct).fadeIn();
            }
        }


    }

    national_code_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(national_code_correct).fadeIn();
        }else{
            $(national_code_correct).fadeOut();
        }
    }

    /*phonenumber_selection.onblur = function (){
        let phonenumber_onblur = phonenumber_selection.value;
        if(!(phonenumber_onblur.length == 11)){
            $(phonenumber_blur).fadeIn();
        }else{
            $(phonenumber_blur).fadeOut();
        }

        if(!(phonenumber_onblur.charAt(0) == "0" && phonenumber_onblur.charAt(1) == "9")){
            $(phonenumber_correct).fadeIn();
        }else{
            $(phonenumber_correct).fadeOut();
        }

        if(pattern_number.test(phonenumber_onblur) == true){
            $(phonenumber_correct_number).fadeOut();
        }else{
            $(phonenumber_correct_number).fadeIn();
        }
    }

    phonenumber_selection.onkeyup = function (){
        let phonenumber_onkeyup = phonenumber_selection.value;
        if(phonenumber_onkeyup.length == 11 && phonenumber_onkeyup.charAt(0) == "0" && phonenumber_onkeyup.charAt(1) == "9"){
            $(phonenumber_blur).fadeOut();
            $(phonenumber_correct).fadeOut();
        }
    }

    phonenumber_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(phonenumber_correct_number).fadeIn();
        }else{
            $(phonenumber_correct_number).fadeOut();
        }
    }*/

    email_selection.onblur = function (){
        let email_onblur = email_selection.value;
        if(email_onblur.length < 9 || email_onblur.length > 40){
            $(email_blur).fadeIn();
            $(email_correct).fadeIn();
        }else{
            $(email_blur).fadeOut();
            let indexOf1_onblur = email_onblur.indexOf("@");
            if(!(indexOf1_onblur == -1)){
                let charAt1_onblur = email_onblur.charAt(indexOf1_onblur + 1);
                let format = /[a-zA-Z]/;
                let format2 = /[A-Z]/;
                if(format.test(charAt1_onblur) != 0 || format2.test(charAt1_onblur) != 0){
                    let charAt2_onblur = email_onblur.charAt(indexOf1_onblur + 2);
                    if(format.test(charAt2_onblur) != 0 || format2.test(charAt2_onblur != 0)){
                        let charAt3_onblur = email_onblur.charAt(indexOf1_onblur + 3);
                        if(format.test(charAt3_onblur) != 0 || format2.test(charAt3_onblur) != 0){
                            let indexOf2_onblur = email_onblur.indexOf(".");
                            if(!(indexOf2_onblur == -1)){
                                let charAt1_dot_onblur = email_onblur.charAt(indexOf2_onblur + 1);
                                if(format.test(charAt1_dot_onblur) != 0 || format2.test(charAt1_dot_onblur) != 0){
                                    let charAt2_dot_onblur = email_onblur.charAt(indexOf2_onblur + 2);
                                    if(format.test(charAt2_dot_onblur) != 0 || format2.test(charAt2_dot_onblur) != 0){
                                        $(email_correct).fadeOut();
                                    }else{
                                        $(email_correct).fadeIn();
                                    }
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }
            }else{
                $(email_correct).fadeIn();
            }
        }
    }

    email_selection.onkeyup = function (){
          let email_onkeyup = email_selection.value;
          if(email_onkeyup.length > 8 && email_onkeyup.length < 40){
              $(email_blur).fadeOut();
              check();
          }

          function check(){
              let indexOf1_onkeyup = email_onkeyup.indexOf("@");
              if(!(indexOf1_onkeyup == -1)){
                  let charAt1_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 1);
                  let format = /[a-zA-Z]/;
                  let format2 = /[A-Z]/;
                  if(format.test(charAt1_onkeyup) != 0 || format2.test(charAt1_onkeyup) != 0){
                      let charAt2_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 2);
                      if(format.test(charAt2_onkeyup) != 0 || format2.test(charAt2_onkeyup != 0)){
                          let charAt3_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 3);
                          if(format.test(charAt3_onkeyup) != 0 || format2.test(charAt3_onkeyup) != 0){
                              let indexOf2_onkeyup = email_onkeyup.indexOf(".");
                              if(!(indexOf2_onkeyup == -1)){
                                  let charAt1_dot_onkeyup = email_onkeyup.charAt(indexOf2_onkeyup + 1);
                                  if(format.test(charAt1_dot_onkeyup) != 0 || format2.test(charAt1_dot_onkeyup) != 0){
                                      let charAt2_dot_onkeyup = email_onkeyup.charAt(indexOf2_onkeyup + 2);
                                      if(format.test(charAt2_dot_onkeyup) != 0 || format2.test(charAt2_dot_onkeyup) != 0){
                                          $(email_correct).fadeOut();
                                      }else{
                                          $(email_correct).fadeIn();
                                      }
                                  }else{
                                      $(email_correct).fadeIn();
                                  }
                              }else{
                                  $(email_correct).fadeIn();
                              }
                          }else{
                              $(email_correct).fadeIn();
                          }
                      }else{
                          $(email_correct).fadeIn();
                      }
                  }else{
                      $(email_correct).fadeIn();
                  }
              }else{
                  $(email_correct).fadeIn();
              }
          }
    }

    email_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 47 && key < 58) && !(key == 64) && !(key > 64 && key < 91) && !(key == 46) && !(key > 96 && key < 123) && !(key > 36 && key < 41) && !(key < 19 && key > 15) && !(key == 20) && !(key == 9) && !(key == 13) && !(key == 116) && !(key > 96 && key < 106) && !(key == 8)){
            e.preventDefault();
            $(email_correct_type).fadeIn();
        }else{
            $(email_correct_type).fadeOut()
        }
    }

    password_selection.addEventListener('keyup' , function (){
        checkPassword(password_selection.value);
    });
    function checkPassword(passw){
        let strength_bar = document.getElementById("strength");
        let strength = 0;
        if(passw.match(pattern1)){
            strength += 1;
            document.getElementById("a_to_z").style.color = "green";
        }else{
            document.getElementById("a_to_z").style.color = "red";
        }

        if(passw.match(pattern2)){
            strength += 1;
            document.getElementById("A_to_Z").style.color = "green";
        }else{
            document.getElementById("A_to_Z").style.color = "red";
        }

        if(passw.match(pattern3)){
            strength += 1;
            document.getElementById("number8").style.color = "green";
        }else{
            document.getElementById("number8").style.color = "red";
        }

        if(passw.match(pattern4)){
            strength += 1;
            document.getElementById("special_char8").style.color = "green";
        }else{
            document.getElementById("special_char8").style.color = "red";
        }

        if(passw.length > 8){
            strength += 1;
            document.getElementById("char8").style.color = "green";
        }else{
            document.getElementById("char8").style.color = "red";
        }

        let bar_color = document.getElementById("strength");
        switch (strength){
            case 0:
                strength_bar.value = 0;
                strength_text.innerHTML = "<span class='text-red-700 text-l font-bold mb-2 text-none'>بسیار ضعیف</span>";
                break;
            case 1:
                strength_bar.value = 20;
                bar_color.classList.add("meter-red");
                bar_color.classList.remove("meter-yellow");
                bar_color.classList.remove("meter-green");
                strength_text.innerHTML = "<span class='text-red-700 text-l font-bold mb-2 text-none'>بسیار ضعیف</span>";
                break;
            case 2:
                strength_bar.value = 40;
                bar_color.classList.add("meter-yellow");
                bar_color.classList.remove("meter-red");
                bar_color.classList.remove("meter-green");
                strength_text.innerHTML = "<span class='text-yellow-700 text-l font-bold mb-2 text-none'>ضعیف</span>";
                break;
            case 3:
                strength_bar.value = 60;
                bar_color.classList.add("meter-yellow");
                bar_color.classList.remove("meter-red");
                bar_color.classList.remove("meter-green");
                strength_text.innerHTML = "<span class='text-yellow-500 text-l font-bold mb-2 text-none'>متوسط</span>";
                break;
            case 4:
                strength_bar.value = 80;
                bar_color.classList.remove("meter-red");
                bar_color.classList.remove("meter-yellow");
                bar_color.classList.add("meter-green");
                strength_text.innerHTML = "<span class='text-green-500 text-l font-bold mb-2 text-none'>قوی</span>";
                break;
            case 5:
                strength_bar.value = 100;
                bar_color.classList.remove("meter-red");
                bar_color.classList.remove("meter-yellow");
                bar_color.classList.add("meter-green");
                strength_text.innerHTML = "<span class='text-green-700 text-l font-bold mb-2 text-none'>بسیار قوی</span>";
                break;
        }
    }
    password_selection.onfocus = function (){
        $(validation_password).fadeIn();
        document.getElementById("scroller_password").scrollIntoView();
    }

    password_selection.onblur = function (){
        $(validation_password).fadeOut();
    }

    password_confirm_selection.onblur = function (){
        let pass_onblur = password_selection.value;
        let pass_config_onblur = password_confirm_selection.value;
        if(pass_onblur != pass_config_onblur){
            $(password_blur).fadeIn();
        }else{
            $(password_blur).fadeOut();
        }
    }

    password_confirm_selection.onkeyup = function (){
        let pass = password_selection.value;
        let pass_config = password_selection.value;
        if(pass != pass_config){
            $(password_blur).fadeIn();
        }else{
            $(password_blur).fadeOut();
        }
    }
    privacy_policy_selection.onclick = function () {
        $(privacy_policy_onsubmit).fadeOut();
    }
    submit_selection.onclick = function (){
        let firstname_value = firstname_selection.value;
        let lastname_value = lastname_selection.value;
        let national_code_value = national_code_selection.value;
        //let phonenumber_value = phonenumber_selection.value;
        let email_value = email_selection.value;
        let password_value = password_selection.value;
        let password_confirm_value = password_confirm_selection.value;
        let privacy_policy = privacy_policy_selection;
        let email_requests = email_requests_selection;
        let os = getOS();
        let number = 0;
        if(firstname_value.length > 2 && firstname_value.length < 26){
            number++;
        }else{
            $(firstname_blur).fadeIn();
        }

        if(pattern_persian.test(firstname_value) == true){
            number++;
        }else{
            $(firstname_blur_lang).fadeIn();
        }

        if(lastname_value.length > 3 && lastname_value.length < 31){
            number++;
        }else{
            $(lastname_blur).fadeIn();
        }

        if(pattern_persian.test(lastname_value) == true){
            number++;
        }else{
            $(lastname_blur_lang).fadeIn()
        }

        if(national_code_value.length == 10){
            number++;
        }else{
            $(national_code_blur).fadeIn();
        }

        if(pattern_number.test(national_code_value) == true){
            number++;
        }else{
            $(national_code_correct).fadeIn();
        }

        /*if(phonenumber_value.length == 11){
            number++;
        }else{
            $(phonenumber_blur).fadeIn()
        }

        if(phonenumber_value.charAt("0") == "0" && phonenumber_value.charAt("1") == "9"){
            number++;
        }else{
            $(phonenumber_correct).fadeIn();
        }*/

        let indexOf1_onclick = email_value.indexOf("@");
        if(!(indexOf1_onclick == -1)){
            let charAt1_onclick = email_value.charAt(indexOf1_onclick + 1);
            let format = /[a-zA-Z]/;
            let format2 = /[A-Z]/;
            if(format.test(charAt1_onclick) != 0 || format2.test(charAt1_onclick) != 0){
                let charAt2_onclick = email_value.charAt(indexOf1_onclick + 2);
                if(format.test(charAt2_onclick) != 0 || format2.test(charAt2_onclick != 0)){
                    let charAt3_onclick = email_value.charAt(indexOf1_onclick + 3);
                    if(format.test(charAt3_onclick) != 0 || format2.test(charAt3_onclick) != 0){
                        let indexOf2_onclick = email_value.indexOf(".");
                        if(!(indexOf2_onclick == -1)){
                            let charAt1_dot_onclick = email_value.charAt(indexOf2_onclick + 1);
                            if(format.test(charAt1_dot_onclick) != 0 || format2.test(charAt1_dot_onclick) != 0){
                                let charAt2_dot_onclick = email_value.charAt(indexOf2_onclick + 2);
                                if(format.test(charAt2_dot_onclick) != 0 || format2.test(charAt2_dot_onclick) != 0){
                                    number++
                                    $(email_correct).fadeOut();
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }
            }else{
                $(email_correct).fadeIn();
            }
        }else{
            $(email_correct).fadeIn();
        }

            if(password_value.length > 8){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern1)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern2)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern3)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern4)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(!(password_value == "")){
                if(password_value == password_confirm_value){
                    number++;
                }else{
                    $(password_blur).fadeIn();
                }
            }else{
                $(password_blur).fadeIn();
            }

            if(privacy_policy_selection.checked == true){
                $(form_is_not_correct).fadeOut();
                number++;
            }else{
                $(form_is_not_correct).fadeIn();
            }

            let request_for_email = false;
            if(email_requests_selection.checked == true){
                request_for_email = true;
            }else{
                request_for_email = false;
            }
            if(number == 14){
                submit_selection.innerHTML = "<i class='fa fa-circle-o-notch fa-spin'></i>";
                let firstname_final_value = document.getElementById("firstname").value;
                let lastname_final_value = document.getElementById("lastname").value;
                let national_code_final_value = document.getElementById("national_code").value;
                // let phonenumber_final_value = document.getElementById("phonenumber").value;
                let email_final_value = document.getElementById("email").value;
                let password_final_value = document.getElementById("password").value;
                let password_confirm_final_value = document.getElementById("password_confirm").value;
                let privacy_policy_final_value = document.getElementById("privacy_policy");
                let request_for_email_final_value = document.getElementById("requests");
                let number_final_dec = 0;

                if(firstname_final_value.length > 2 && firstname_final_value.length < 26){
                    number_final_dec++;
                }else{
                    $(firstname_blur).fadeIn();
                }

                if(pattern_persian.test(firstname_final_value) == true){
                    number_final_dec++;
                }else{
                    $(firstname_blur_lang).fadeIn();
                }

                if(lastname_final_value.length > 3 && lastname_final_value.length < 31){
                    number_final_dec++;
                }else{
                    $(lastname_blur).fadeIn();
                }

                if(pattern_persian.test(lastname_final_value) == true){
                    number_final_dec++;
                }else{
                    $(lastname_blur_lang).fadeIn()
                }

                if(national_code_final_value.length == 10){
                    number_final_dec++;
                }else{
                    $(national_code_blur).fadeIn();
                }

                if(pattern_number.test(national_code_final_value) == true){
                    number_final_dec++;
                }else{
                    $(national_code_correct).fadeIn();
                }

                /*if(phonenumber_final_value.length == 11){
                    number_final_dec++;
                }else{
                    $(phonenumber_blur).fadeIn()
                }

                if(phonenumber_final_value.charAt("0") == "0" && phonenumber_final_value.charAt("1") == "9"){
                    number_final_dec++;
                }else{
                    $(phonenumber_correct).fadeIn();
                }*/

                let indexOf1_onsubmit = email_final_value.indexOf("@");
                if(!(indexOf1_onsubmit == -1)){
                    let charAt1_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 1);
                    let format = /[a-z]/;
                    let format2 = /[A-Z]/;
                    if(format.test(charAt1_onsubmit) != 0 || format2.test(charAt1_onsubmit) != 0){
                        let charAt2_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 2);
                        if(format.test(charAt2_onsubmit) != 0 || format2.test(charAt2_onsubmit != 0)){
                            let charAt3_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 3);
                            if(format.test(charAt3_onsubmit) != 0 || format2.test(charAt3_onsubmit) != 0){
                                let indexOf2_onsubmit = email_final_value.indexOf(".");
                                if(!(indexOf2_onsubmit == -1)){
                                    let charAt1_dot_onsubmit = email_final_value.charAt(indexOf2_onsubmit + 1);
                                    if(format.test(charAt1_dot_onsubmit) != 0 || format2.test(charAt1_dot_onsubmit) != 0){
                                        let charAt2_dot_onsubmit = email_final_value.charAt(indexOf2_onsubmit + 2);
                                        if(format.test(charAt2_dot_onsubmit) != 0 || format2.test(charAt2_dot_onsubmit) != 0){
                                            number_final_dec++
                                            $(email_correct).fadeOut();
                                        }else{
                                            $(email_correct).fadeIn();
                                        }
                                    }else{
                                        $(email_correct).fadeIn();
                                    }
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }

                    if(password_final_value.length > 8){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern1)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern2)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern3)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern4)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(!(password_final_value == "")){
                        if(password_final_value == password_confirm_final_value){
                            number_final_dec++;
                        }else{
                            $(password_blur).fadeIn();
                        }
                    }else{
                        $(password_blur).fadeIn();
                    }

                    let privacy_policy_final_value_checked = true;

                    if(privacy_policy_final_value.checked == true){
                        number_final_dec++;
                        let privacy_policy_final_value_checked = true;
                    }

                    let request_for_email = false;
                    if(request_for_email_final_value.checked == true){
                        request_for_email = true;
                    }else{
                        request_for_email = false;
                    }

                    if(number_final_dec == 14){
                        let secret = "6LckgPAZAAAAAMu2c0GUv4ZNGhliiY3W8xoi4x0d";
                        document.getElementById("response_area").innerHTML = document.querySelector(".g-recaptcha-response").value;
                        let xmlhttp;
                        if(window.XMLHttpRequest){
                            xmlhttp = new XMLHttpRequest();
                        }else{
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        let submit = 0;
                        xmlhttp.open("POST" , "signup.php" , true);
                        xmlhttp.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
                        xmlhttp.send("submit=" + submit + "&firstname_final_value=" + firstname_final_value + "&lastname_final_value=" + lastname_final_value + "&national_code_final_value=" + national_code_final_value /*+ "&phonenumber_final_value=" + phonenumber_final_value*/ + "&email_final_value=" + email_final_value + "&password_final_value=" + password_final_value + "&password_confirm_final_value=" + password_confirm_final_value + "&privacy_policy_final_value=" + privacy_policy_final_value.checked + "&request_for_email=" + request_for_email + "&signup_system_os=" + os + "&secret=" + secret);

                        xmlhttp.onreadystatechange = function (){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("response_area").innerHTML = this.responseText;
                                submit_selection.innerHTML = "ثبت نام";
                            }
                        };
                    }else{
                        $(form_is_not_correct).fadeIn();
                    }
            }else{
                $(form_is_not_correct).fadeIn()
            }
        }
</script>

<?php require "src/includes/footer.php"; ?>
