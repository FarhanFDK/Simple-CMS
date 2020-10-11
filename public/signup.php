<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div>
		
		<form class="text-center">
			<div>
				<label class="mr-2 text-gray-700 text-l font-bold mb-2 text-none" for="firstname">نام: </label><span class="text-red-700">*</span>
				<input class="firstname my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstname" name="firstname" maxlength="20" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="firstname_blur">نام باید بین 3 تا 20 کاراکتر باشد</span></div>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="firstname">نام خانوادگی: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="lastname" name="lastname" maxlength="20" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="lastname_blur">نام خانوادگی باید بین 4 تا 20 کاراکتر باشد</span></div>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="national_code">شماره ملی: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="national_code" name="national_code" maxlength="10" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="phonenumber">شماره همراه: </label><span class="text-red-700">*</span>
				<input class="phonenumber ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="phonenumber" name="phonenumber" maxlength="15" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="phonenumber_blur">شماره همراه باید حداقل 11 رقم باشد</span></div>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="email">ایمیل: </label>
				<input class="my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email" maxlength="30" autocomplete="FALSE"/>
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
	$(document).ready(function (){
		/*$(document).keypress(function(e){
			let key = e.which;
			if(e.which == 13){
				$("#submit").click();
			}
		});*/

		$("#firstname").keypress(function(e){
			let key = e.which;
			// alert(key);
			if(key < 58 && key > 47 || key == 45  || key == 61 || key == 42 || key == 47 || key == 43){
				e.preventDefault();
			}
			let valueF = $("#firstname").val();
			if(valueF.length >= 2){
				$("#firstname_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#firstname").blur(function(){
			let value = $("#firstname").val();
			if(value.length < 3){
				$("#firstname_blur").fadeIn();
				$("#submit").prop('disabled', true);
			}else{
				$("#firstname_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#lastname").keypress(function(e){
			let key = e.which;
			// alert(key);
			if(key < 58 && key > 47 || key == 45  || key == 61 || key == 42 || key == 47 || key == 43){
				e.preventDefault();
			}
			let valueL = $("#lastname").val();
			if(valueL.length >= 3){
				$("#lastname_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#lastname").blur(function(){
			let value = $("#lastname").val();
			if(value.length < 4){
				$("#lastname_blur").fadeIn();
				$("#submit").prop('disabled', true);
			}else{
				$("#lastname_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#phonenumber").blur(function(){
			let value = $("#phonenumber").val();
			if(value.length < 11){
				$("#phonenumber_blur").fadeIn();
				$("#submit").prop('disabled', true);
			}else{
				$("#phonenumber_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#phonenumber").keypress(function(e){
			let key = e.which;
			// alert(key);
			if(!(key < 58 && key > 47)){
				e.preventDefault();
			}
			let valueN = $("#phonenumber").val();
			if(valueN.length >= 10){
				$("#phonenumber_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#password_confirm").keypress(function(){
			let valueP = $("#password").val();
			let valuePC = $("#password_confirm").val();
			if(!(valuePC = valueP)){
				
			}
		});

		$("#national_code").blur(function(){
			let valueNC = $("#national_code").val();
			if(valueNC.length < 10){
				$("#national_code_blur").fadeIn();
				$("#submit").prop('disabled', true);
			}else{
				$("#national_code_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}
		});

		$("#national_code").keypress(function(e){
			let valueNC = $("#national_code").val();
			if(valueNC.length == 9){
				$("#national_code_blur").fadeOut();
				$("#submit").prop('disabled', false);
			}

		});

		$("#submit2").on('click' , function(){
        var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var email = $("#email").val();
		var phonenumber = $("phonenumber").val();
        if(firstname == "" || lastname == "" || phonenumber == "" || password == "" || password_confirm == ""){
            alert("Please complete the form");
        }else{
            $.ajax({
                url:'http://localhost/ajax/public/src/includes/update.php',
                method:'POST',
                data:{
                    submit: 1,
                    firstnamePHP:firstname,
					lastnamePHP:lastname,
					emailPHP:email,
					phonenumberPHP:phonenumber,
					passwordPHP:password
                },
                success:function(response){
                    $("#response").html(response);
                    // $("#submit").attr("disabled" , "true");
                    console.log("SUCCESS!");
                },
                dataType: 'text'
            });
        }
    });
});
</script>
<?php require "src/includes/footer.php"; ?>