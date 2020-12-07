<?php $title = "شرکت افراگسترنوین-تایید ایمیل"; ?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php
    class Content{
        public $h;
    }
    if(isset($_POST['submit_number'])){
        $verify_email = new VERIFY_EMAIL();
        $verify_email->verify();
    }
    if(isset($_POST['submit'])){
        $signup = NEW SIGNUP();
        $signup->connect();
    }
    if(isset($_POST['resend_number'])){

    }
    if($_SESSION['national_code'] == null || $_SESSION['firstname'] == null || $_SESSION['lastname'] == null || $_SESSION['time'] == null || $_SESSION['email'] == null){
        header("Location: login.php");
    }elseif(isset($_SESSION['time'])){
        $time_1 = $_SESSION['time'] ? $_SESSION['time'] : 0;
        $time = time();
    }



?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div class="text-center">
        <form method="post">
            <div class="unselectable" id="notification1" unselectable="on">کدی به ایمیل شما جهت تایید ایمیل ارسال شده است.</div>
            <div class="unselectable" id="notification2" unselectable="on">لطفا کد را وارد کرده و گزینه تایید را بزنید</div>
            <div class="text-red-700 text-none font-bold text-l unselectable" id="timer_widget" unselectable="on"></div>
            <button class="relative bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" style="left: 40px;top:40px;" id="resend_number" name="resend_number"><i class="fas fa-envelope"></i>ارسال دوباره</button>
            <div class="text-center">
                <input maxlength="6" class="firstname text-center w-1/3 my-4 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="number" id="number" style="direction: ltr;">
                <div><span id="number_blur" class="hidden text-red-700 font-bold text-none">لطفا کد را به صورت کامل وارد کنید بعد دکمه ثبت را بزنید</span></div>
            </div>
            <div>
                <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" name="submit_number" id="submit_number">ثبت</button>
            </div>
            <noscript class="text-red-700 text-l font-bold mb-2 text-none m-auto" language="javascript">
                مرورگر شما از جاوااسکریپت استفاده نمیکند
                <br>
                لطفا برای جلوگیری از بروز مشکل از مرورگری که از جاوااسکریپت پشتیبانی میکند استفاده کنید
            </noscript>
            <div id="response_area">
                
            </div>
        </form>
        <script>
            let time_1 = <?php echo $time_1 ?>;
            let time = <?php echo $time; ?>;
            let value = document.getElementById("value");
            let resend_number = document.getElementById("resend_number");
            let timer_widget = document.getElementById("timer_widget");
            let submit_number = document.getElementById("submit_number");
            let timer = 1;
            let number = document.getElementById("number");
            let number_blur = document.getElementById("number_blur");
            let notification1 = document.getElementById("notification1");
            let notification2 = document.getElementById("notification2");
            let timer_interval = setInterval(timer_func , 1000);
            submit_number.onclick = function (){
                
            }
            function timer_func(){
                if(timer <= 0){
                    notification1.hidden = true;
                    notification2.hidden = true;
                    timer_widget.innerHTML = "<span class='text-green-500 font-bold text-none'>کد منقضی شد.لطفا برای ارسال مجدد کد روی دکمه ارسال مجدد کلیک کنید</span>";
                    let xmlhttpdes;
                    if(window.XMLHttpRequest){
                        xmlhttpdes = new XMLHttpRequest();
                    }else{
                        xmlhttpdes = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttpdes.open("POST" , "verify-email.php" , true);
                    xmlhttpdes.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
                    xmlhttpdes.send("destroy_me=1");
                    xmlhttpdes.onreadystatechange = function (){
                        if(this.readyState == 4 && this.status == 200){
                            timer_widget.innerHTML = "<span class='text-green-500 font-bold text-none'>کد منقضی شد.لطفا برای ارسال مجدد کد روی دکمه ارسال مجدد کلیک کنید</span>";
                        }
                    };
                    clearInterval(timer_interval);
                }else{
                    time++;
                    timer = time_1 - time;
                    if(timer <= 0){
                        clearInterval(timer_interval);
                        timer_widget.innerHTML = "<span class='text-green-500 font-bold text-none'>کد منقضی شد.لطفا برای ارسال مجدد کد روی دکمه ارسال مجدد کلیک کنید</span>";
                        notification1.hidden = true;
                        notification2.hidden = true;
                    }else{
                        notification1.hidden = false;
                        notification2.hidden = false;
                        let seconds = timer % 60;
                        seconds = ("0" + seconds).slice(-2);
                        let minutes = Math.floor(timer / 60);
                        timer_widget.innerHTML = "توجه! کد تا <span class='text-green-500 font-bold text-none'>" + minutes + ":" + seconds + "</span> منقضی میشود";
                    }
                }
            }
            number.onkeypress = function (e){
                let key = e.which ? e.which : e.keyCode;
                if(!(key < 58 && key > 47)){
                    e.preventDefault();
                }
            }
            number.onkeydown = function (){
                let number_value = number.value;
                if(number_value.length == 6){
                    $(number_blur).fadeOut();
                }
            }
            submit_number.onclick = function (){
                if(number.value.length !== 6){
                    $(number_blur).fadeIn();
                }else{
                    document.getElementById("submit_number").disabled =  "true";
                    submit_number.innerHTML = "<i class='fa fa-circle-o-notch fa-spin'></i>";
                    let xmlhttp;
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }else{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    let submit = 0;
                    let number_value = number.value;
                    xmlhttp.open("POST" , "verify-email.php" , true);
                    xmlhttp.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
                    xmlhttp.send("submit_number=2&number=" + number_value);
                    xmlhttp.onreadystatechange = function (){
                        if(this.readyState == 4 && this.status == 200){
                            submit_number.innerHTML = "ثبت";
                            if(this.responseText.includes("تایید")){
                                document.getElementById("response_area").innerHTML = this.responseText + "<br>" + "<span class='text-green-600 font-bold text-xl'>در چند لحظه دیگر به صفحه ورود هدایت می شوید</span>";
                                setTimeout(function (){
                                    location.replace("login.php");
                                } , 3000);
                            }else if(this.responseText.includes("منقضی")){
                                document.getElementById("response_are").innerHTML = this.responseText;
                                document.getElementById("submit_number").disabled = "false" ;
                            }else{
                                document.getElementById("response_are").innerHTML = this.responseText;
                            }
                        }
                    };
                }
            }
        </script>
    </div>
</div>
<?php require "src/includes/footer.php"; ?>