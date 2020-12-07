
<?php $title = "شرکت افراگسترنوین-ثبت نام"; ?>
<?php
    class Content{
        public $h;
    }
?>
<?php
    /*if((isset($_COOKIE['time'])) && isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['national_code']) && isset($_COOKIE['email'])){
        header("Location: verify-email.php");
    }
    if(!isset($_COOKIE['time']) && isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['national_code']) && isset($_COOKIE['email'])){
        header("Location: dashboard.php");
    }*/
?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div>
        <form class="text-center unselectable" method="post" action="verify-email.php" onsubmit="return validation();" id="form">
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
                        <div><span class="hidden mr-10 sm:mr-10 md:mr-10 lg:mr-32 xl:mr-32 text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
                        <div><span class="hidden mr-10 sm:mr-10 md:mr-10 lg:mr-32 xl:mr-32 text-red-700 text-l font-bold mb-2 text-none" id="national_code_correct">لطفا به عدد لاتین تایپ کنید</span></div>
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
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mr-0 sm:mr-0 md:mr-0 lg:mr-4 xl:mr-4">
                        <label class="text-gray-700 text-l mr-8 sm:mr-8 md:mr-8 lg:mr-20 xl:mr-20 font-bold mb-2 text-none" for="password">رمز عبور : </label><span class="text-red-700">*</span>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" maxlength="32" autocomplete="FALSE"/>
                    </div>
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 ml-20">
                        <label class="text-gray-700 text-l font-bold mb-2 text-none" for="password_confirm">تایید رمز عبور: </label><span class="text-red-700">*</span>
                        <input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirm" name="password_confirm" maxlength="32" autocomplete="FALSE"/>
                        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور همخوانی ندارد</span></div>
                    </div>
                    <!--
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mr-0 sm:mr-0 md:mr-0 lg:mr-10 xl:mr-10">
                        <label class="text-gray-700 text-l font-bold mb-2 mr-2" for="password">رمز عبور: </label><span class="text-red-700">*</span>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="ml-6 sm:ml-6 md:ml-6 lg:ml-0 xl:ml-0 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" maxlength="32" autocomplete="FALSE"/>
                    </div>
                    <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 ml-20">
                        <label class="text-gray-700 text-l mr-4 sm:mr-4 md:mr-4 lg:mr-0 xl:mr-0 font-bold mb-2" for="password_confirm">تایید رمز عبور: </label><span class="text-red-700">*</span>
                        <input class="ml-16 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirm" name="password_confirm" maxlength="32" autocomplete="FALSE"/>
                        </div>
                    -->
                </div>
                <div style="direction:ltr;">
                    <div id="strength_text">

                    </div>
                    <div id="strength_bar">
                        <div id="strength_bar_fill">
                            
                        </div>
                    </div>
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
                    <div class="g-recaptcha" id="recaptcha" data-callback="recaptcha_changed" data-sitekey="6LckgPAZAAAAAOx7EZxBTqJhB_Nw-g7b3xOL7gGg"></div>
                </div>
                <div class="hidden text-red-700 text-l font-bold mb-2 text-none" id="recaptcha_correct">
                    لطفا گزینه &#34; من ربات نیستم &#34; را علامت بزنید
                </div>
                <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
                <!-- IMPORTANT! -->
                <div>
                    <input type="text" name="signup_system_os" id="signup_system_os" value="getOS()" hidden>
                    <input type="text" name="privacy" id="privacy" value="false" hidden>
                    <input type="text" name="request_for_email" value="false" hidden>
                </div>
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
                    لطفا فرم را به درستی کامل کنید
                </div>
                <div id="response_area">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            $_SESSION['error'] = "";
                        }
                    ?>
                </div>
                <div>
                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="submit" id="submit" name="submit">ثبت نام</button>
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
<script src="src/js/signup.js"></script>

<?php require "src/includes/footer.php"; ?>
