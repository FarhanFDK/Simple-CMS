<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div>
		<form class="text-center">
			<div>
				<label class="mr-2 text-gray-700 text-l font-bold mb-2 text-none" for="firstname">نام: </label><span class="text-red-700">*</span>
				<input class="firstname my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstname" name="firstname" autocomplete="FALSE"/>
				<span class="text-gray-700 text-l font-bold mb-2 text-none" id="name"></span>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="firstname">نام خانوادگی: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstname" name="firstname" autocomplete="FALSE"/>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="phonenumber">شماره همراه: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="phonenumber" name="phonenumber" autocomplete="FALSE"/>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2 text-none" for="email">ایمیل: </label>
				<input class="my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email" autocomplete="FALSE"/>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2" for="password">رمز عبور: </label><span class="text-red-700">*</span>
				<input class="ml-4 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" name="password" autocomplete="FALSE"/>
			</div>
			<div>
				<label class="text-gray-700 text-l font-bold mb-2" for="password_confirm">تایید رمز عبور: </label><span class="text-red-700">*</span>
				<input class="ml-12 my-4 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password_confirm" name="password_confirm" autocomplete="FALSE"/>
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
		$(document).keypress(function(e){
			let key = e.which;
			if(e.which == 13){
				$("#submit").focus();
			} 
		});
		$("#firstname").keypress(function(e){
			let key = e.which;
			// alert(key);
			if(key < 58 && key > 47 || key == 45  || key == 61 || key == 42 || key == 47 || key == 43){
				e.preventDefault();
			}
		})
	});
</script>
<?php require "src/includes/footer.php"; ?>