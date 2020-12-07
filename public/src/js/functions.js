"use strict"
function set(){
		document.getElementById("clock").innerText = clock.show();
		setInterval(set , 1000);
}


function getOS() {
		let userAgent = window.navigator.userAgent;
		let platform = window.navigator.platform;
		let macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'];
		let windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'];
		let iosPlatforms = ['iPhone', 'iPad', 'iPod'];
		let os = undefined;

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