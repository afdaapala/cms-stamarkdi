document.addEventListener('DOMContentLoaded', () => {
    function showTime(){
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = date.getTimezoneOffset();
        if (session == -480){
            session = "WITA";
        }
        else if (session == -420){
            session = "WIB";
        }
        else if (session == -540){
            session = "WIT";
        }      
        else{
            session = "Outside Indonesian Timezone";
        }
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("DisplayJam").innerText = time;
        document.getElementById("DisplayJam").textContent = time;
        setTimeout(showTime, 1000);
    }
    showTime();
})