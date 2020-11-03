<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname_final_value'];
        $grade = 0;
        if(strlen($firstname) > 2 && strlen($firstname) < 21){
            ++$grade;
        }

        $lastname = $_POST['lastname_final_value'];

        if(strlen($lastname) > 3 && strlen($lastname) < 21){
            ++$grade;
        }

        $national_code = $_POST['national_code_final_value'];

        if(strlen($national_code) == 10){
            ++$grade;
        }

        $phonenumber = $_POST['phonenumber_final_value'];

        if(strlen($phonenumber) == 11){
            ++$grade;
        }

        $email = $_POST['email_final_value'];

        if(strlen($email) > 8 && strlen($email) < 31){
            $special_char2 = ".";
            $index_length = strlen(strpos($email , "@"));
            $index_length2 = strlen(strpos($email , "."));
            if($index_length != 0 && $index_length2 != 0){
                $
            }
        }
    }
?>
<div class="middle mtop">
  <div>
		<form class="text-center unselectable">
			<div>
        <div>لطفا اطلاعات خود را جهت ثبت نام در سایت شرکت افراگستر نوین وارد نموده و گزینه ثبت نام را کلیک کنید</div>
				<label class="mr-2 text-gray-700 text-l font-bold mb-2 text-none" for="firstname">نام: </label><span class="text-red-700">*</span>
				<input class="firstname my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstname" name="firstname" maxlength="20" placeholder="علی" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="firstname_blur">نام باید بین 3 تا 20 کاراکتر باشد</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="firstname_blur_lang">لطفا به فارسی تایپ کنید</span></div>
      </div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="lastname">نام خانوادگی: </label><span class="text-red-700">*</span>
				<input class="lastname ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="lastname" name="lastname" maxlength="20" placeholder="امیری" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="lastname_blur">نام خانوادگی باید بین 4 تا 20 کاراکتر باشد</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="lastname_blur_lang">لطفا به فارسی تایپ کنید</span></div>
      </div>
			<div>
				<label class="mr-4 text-gray-700 text-l font-bold mb-2 text-none" for="national_code">شماره ملی: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="0123456789" type="text" id="national_code" name="national_code" maxlength="10" style="direction:ltr;font-family:yekan;" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_correct">لطفا به عدد لاتین تایپ کنید</span></div>
			</div>
			<div>
				<label class="mr-1 text-gray-700 text-l font-bold mb-2 text-none" for="phonenumber">شماره همراه: </label><span class="text-red-700">*</span>
				<input class="phonenumber ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="09123456789" type="text" id="phonenumber" name="phonenumber" style="direction:ltr;font-family:yekan;" maxlength="11" maxlength="15" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_blur">شماره همراه باید 11 رقم باشد</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_correct">لطفا شماره تلفن را درست وارد کنید</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_correct_number">لطفا به عدد لاتین تایپ کنید</span></div>
      </div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="email">ایمیل: </label><span class="text-red-700">*</span>
				<input class="my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email" placeholder="Ali.Amiri@example.com" style="direction:ltr;" maxlength="30" autocomplete="FALSE"/>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="email_blur">ایمیل باید بین 9 تا 30 کاراکتر باشد</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="email_correct">لطفا ایمیل را درست وارد کنید</span></div>
        <div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="email_correct_type">فقط اعداد،حروف لاتین،نقطه و کاراکتر @ مجاز است</span></div>
      </div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2" for="password">رمز عبور: </label><span class="text-red-700">*</span>
				<input class="ml-4 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" maxlength="32" autocomplete="FALSE"/>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2" for="password_confirm">تایید رمز عبور: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirm" name="password_confirm" maxlength="32" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور همخوانی ندارد</span></div>
			</div>
      <div style="direction:ltr;">
        <div class="line-password m-auto inline-block bg-green-500"></div><div class="line-password m-auto inline-block"></div><div class="line-password m-auto inline-block"></div><div class="line-password m-auto inline-block"></div>
      </div>
      <div class="text-red-500">
        ضعیف
      </div>
      <div class="text-yellow-500">
        متوسط
      </div>
      <div class="text-green-500">
        قوی
      </div>
      <div class="text-green-600">
        خیلی قوی
      </div>
      <div>
				<div>
					<input class="ml-2 cursor-pointer" type="checkbox" id="privacy_policy" name="priacy_policy" />
					<label class="text-gray-700 text-l font-bold mb-2" for="privacy_policy"><a class="text-blue-400" href="policy.php" title="" target="_blank">شرایط</a> را خوانده و قبول دارم</label><span class="text-red-700">*</span>
				</div>
				<div>
					<input class="ml-2 cursor-pointer" type="checkbox" id="requests" name="requests" />
					<label class="text-gray-700 text-l font-bold mb-2" for="requests">مایل به دریافت ایمیل هستم</label>
				</div>
			</div>
			<div>
				<input class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" id="submit" name="submit" value="ثبت نام" />
			</div>
		</form>
    </div>
</div>
<script>
    "use strict"
    let fisrtname_blur = document.getElementById("firstname_blur");
    let firstname_blur_lang = document.getElementById("firstname_blur_lang");
    let lastname_blur = document.getElementById("lastname_blur");
    let lastname_blur_lang = document.getElementById("lastname_blur_lang");
    let national_code_blur = document.getElementById("national_code_blur");
    let national_code_correct = document.getElementById("national_code_correct");
    let phonenumber_blur = document.getElementById("phonenumber_blur");
    let phonenumber_correct = document.getElementById("phonenumber_correct");
    let phonenumber_correct_number = document.getElementById("phonenumber_correct_number");
    let email_blur = document.getElementById("email_blur");
    let password_blur = document.getElementById("password_blur");
    document.getElementById("firstname").onblur = function (){
        let firstname_onblur = document.getElementById("firstname").value.length;
        if(firstname_onblur < 3 || firstname_onblur > 20){
            $(firstname_blur).fadeIn();
        }else{
            $(firstname_blur).fadeOut();
            $(firstname_blur_lang).fadeOut();
        }
    }

    document.getElementById("firstname").onkeyup = function (){
        let firstname_onkeyup = document.getElementById("firstname").value.length;
        if(firstname_onkeyup > 2 && firstname_onkeyup < 21){
            $(firstname_blur).fadeOut();
            $(firstname_blur_lang).fadeOut();
        }
    }

    document.getElementById("firstname").onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            e.preventDefault();
            $(firstname_blur_lang).fadeIn();
        }else{
            $(firstname_blur_lang).fadeOut();
        }
    }

    document.getElementById("lastname").onblur = function (){
        let lastname_onblur = document.getElementById("lastname").value.length;
        if(lastname_onblur < 4 || lastname_onblur > 20){
            $(lastname_blur).fadeIn();
        }else{
            $(lastname_blur).fadeOut();
            $(lastname_blur_lang).fadeOut();
        }
    }

    document.getElementById("lastname").onkeyup = function (){
        let lastname_onkeyup = document.getElementById("lastname").value.length;
        if(lastname_onkeyup > 3 && lastname_onkeyup < 21){
            $(lastname_blur).fadeOut();
            $(lasttname_blur_lang).fadeOut();
        }
    }

    document.getElementById("lastname").onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            e.preventDefault();
            $(lastname_blur_lang).fadeIn();
        }else{
            $(lastname_blur_lang).fadeOut();
        }
    }

    document.getElementById("national_code").onblur = function (){
        let national_code_onblur = document.getElementById("national_code").value.length;
        if(!(national_code_onblur == 10)){
            $(national_code_blur).fadeIn();
        }else{
            $(national_code_blur).fadeOut();
        }
    }

    document.getElementById("national_code").onkeyup = function (){
        let national_code_onkeyup = document.getElementById("national_code").value.length;
        if(national_code_onkeyup > 9 && national_code_onkeyup < 11){
            $(national_code_blur).fadeOut();
        }
    }

    document.getElementById("national_code").onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(national_code_correct).fadeIn();
        }else{
            $(national_code_correct).fadeOut();
        }
    }

    document.getElementById("phonenumber").onblur = function (){
        let phonenumber_onblur = document.getElementById("phonenumber").value;
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
    }

    document.getElementById("phonenumber").onkeyup = function (){
        let phonenumber_onkeyup = document.getElementById("phonenumber").value;
        if(phonenumber_onkeyup.length == 11 && phonenumber_onkeyup.charAt(0) == "0" && phonenumber_onkeyup.charAt(1) == "9"){
            $(phonenumber_blur).fadeOut();
            $(phonenumber_correct).fadeOut();
        }
    }

    document.getElementById("phonenumber").onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(phonenumber_correct_number).fadeIn();
        }else{
            $(phonenumber_correct_number).fadeOut();
        }
    }

    document.getElementById("email").onblur = function (){
        let email_onblur = document.getElementById("email").value;
        if(email_onblur.length < 9 || email_onblur.length > 30){
            $(email_blur).fadeIn();
            $(email_correct).fadeIn();
        }else{
            $(email_blur).fadeOut();
            let special_char1 = email_onblur.indexOf("@");
            if(!(special_char1 == -1)){
                let special_char2 = email_onblur.indexOf(".");
                if(!(special_char2 == -1)){
                    let char_index = email_onblur.charAt(special_char2 + 2);
                    if(!(char_index == 0)){
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
        }
    }

    document.getElementById("email").onkeyup = function (){
          let email_onkeyup = document.getElementById("email").value;
          if(email_onkeyup.length > 8 && email_onkeyup.length < 30){
              $(email_blur).fadeOut();
              check();
          }

          function check(){
              let special_char1 = email_onkeyup.indexOf("@");
              let char_index_for = email_onkeyup.charAt(special_char1 + 2);
              if(!(char_index_for == 0)){
                  let special_char2 = email_onkeyup.indexOf(".");
                  if(!(special_char2 == -1)){
                      let char_index = email_onkeyup.charAt(special_char2 + 2);
                      if(!(char_index == 0)){
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
          }
    }

    document.getElementById("email").onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 47 && key < 58) && !(key == 64) && !(key == 46) && !(key > 96 && key < 123) && !(key > 36 && key < 41) && !(key < 19 && key > 15) && !(key == 20) && !(key == 9) && !(key == 13) && !(key == 116) && !(key > 96 && key < 106) && !(key == 8)){
            e.preventDefault();
            $(email_correct_type).fadeIn();
        }else{
            $(email_correct_type).fadeOut()
        }
    }

    document.getElementById("password").onkeyup = function (){
        let password_onkeyup = document.getElementById("password").newPassword.value;
        let pattern1 = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if(pattern1.test(password_onkeyup)){
          alert();
        }

    }
</script>
<?php require "src/includes/footer.php"; ?>
