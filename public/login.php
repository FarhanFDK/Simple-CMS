<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div>
        <form class="text-center">
            <div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="national_code">شماره ملی: </label>
				<input class="phonenumber ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="national_code" name="national_code" maxlength="15" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="national_code_blur">شماره ملی باید 10 رقم باشد</span></div>
            </div>
            <div>
				<label class="mr-5 text-gray-700 text-l font-bold mb-2 text-none" for="password">رمزعبور: </label>
				<input class="phonenumber ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" maxlength="32" autocomplete="FALSE"/>
				<div><span class="hidden text-red-700 text-l font-bold mb-2 text-none" id="password_blur">رمزعبور باید بین 8 تا 32 کاراکتر باشد</span></div>
            </div>
            <div>
				<input class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer my-2" type="button" id="submit" name="submit" value="ثبت نام" />
			</div>
        </form>
    </div>
</div>
<script>
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

    $("#national_code").keydown(function(e){
        let key = e.which;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
        }
        var valueN = $("#national_code").val();
        if(valueN.length > 8){
            $("#national_code_blur").fadeOut();
            $("#submit").prop('disabled', false);
        }
    });

    $("#password").blur(function(){
        let valueP = $("#password").val();
        if(valueP.length < 8){
            $("#password_blur").fadeIn();
            $("#submit").prop('disabled', true);
        }else{
            $("#password_blur").fadeOut();
            $("#submit").prop('disabled', false);
        }
    });

    $("#password").keydown(function(){
        var valueP = $("#password").val();
        if(valueP.length > 6){
            $("#password_blur").fadeOut();
            $("#submit").prop('disabled', false);
        }
    });
</script>
<?php require "src/includes/footer.php"; ?>