"use strict"
function set(){
	document.getElementById("clock").innerText = clock.show();
	setInterval(set , 1000);
}


function getOS() {
	let userAgent = window.navigator.userAgent,
	platform = window.navigator.platform,
	macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
	windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
	iosPlatforms = ['iPhone', 'iPad', 'iPod'],
	os = null;

	if (macosPlatforms.indexOf(platform) !== -1) {
		os = 'macOS';
	} else if (iosPlatforms.indexOf(platform) !== -1) {
		os = 'iOS';
	} else if (windowsPlatforms.indexOf(platform) !== -1) {
		os = 'Windows';
	} else if (/Android/.test(userAgent)) {
		os = 'Android';
	} else if (!os && /Linux/.test(platform)) {
		os = 'Linux';
	}
	return os;
}
function request(){
	let xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			let response = this.responseText;
		}
	};
	xmlhttp.open("POST" , "http://localhost/Simple-CMS/public/contact-us.php" , true);
	let name = document.getElementById().value;
	let phonenumber = document.getElementById().value;
	let 
	xmlhttp.send();
	return response;
}