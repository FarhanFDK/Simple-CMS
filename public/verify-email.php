<?php $title = "شرکت افراگسترنوین-تایید ایمیل"; ?>
<?php
    class Content{
        public $h;
    }
    $time_1 = time() + 300;
    $time = time();
?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div class="text-center">
        <form method="post">
            <div class="unselectable" unselectable="on">کدی به ایمیل شما جهت تایید ایمیل ارسال شده است.</div>
            <div class="unselectable" unselectable="on">لطفا کد را وارد کرده و گزینه تایید را بزنید</div>
            <div class="text-red-700 text-none font-bold text-l unselectable" unselectable="on">توجه! کد تا <span id="value"></span> منقضی می شود</div>
            <div id="value">
                
            </div>
            <div>
                <input maxlength="6" class="firstname text-center w-1/2 my-4 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="code" id="code" placeholder="123456" style="direction: ltr;">
            </div>
            <div>
                <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" name="submit" id="submit">ثبت</button>
            </div>
            <script>
                let time_1 = <?php echo $time_1; ?>;
                let time = <?php echo $time; ?>;
                let value = document.getElementById("value").innerHTML;
                setInterval(function (){
                    time++;
                    let timer = time_1 - time;
                    let seconds = timer % 60;
                    seconds = ("0" + seconds).slice(-2);
                    let minutes = Math.floor(timer / 60);
                    document.getElementById("value").innerHTML = "<span class='text-green-500 font-bold text-none'>" + minutes + ":" + seconds + "</span>";
                    if(timer == 0){
                        value = "00:00";
                    }
                } , 1000);
            </script>
        </form>
    </div>
</div>
<?php require "src/includes/footer.php"; ?>