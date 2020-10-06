function set(){
    document.getElementById("clock").innerText = clock.show();
    setInterval(set , 1000);
}