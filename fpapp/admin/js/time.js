let hh = document.getElementById("hh");
let mm = document.getElementById("mm");
let ss = document.getElementById("ss");
time();
function time() {
    setInterval(time, 1000)
    let date = new Date();
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();

    if (hour > 12) {
        hour -= 12;
    }

    hour = hour < 10 ? "0" + hour : hour;
    minute = minute < 10 ? "0" + minute : minute;
    second = second < 10 ? "0" + second : second;

    hh.textContent = hour;
    mm.textContent = minute;
    ss.textContent = second;

}

