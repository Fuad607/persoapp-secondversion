function initDashboard(){
    startTime();
    getMonth();
    getDay();
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function getMonth(){
    var d = new Date();
    var weekday = new Array(7);
    weekday[0] =  "Januar";
    weekday[1] = "Februar";
    weekday[2] = "März";
    weekday[3] = "April";
    weekday[4] = "Mai";
    weekday[5] = "Juni";
    weekday[6] = "Juli";
    weekday[7] = "August";
    weekday[8] = "September";
    weekday[9] = "Oktober";
    weekday[10] = "November";
    weekday[11] = "Dezember";

    var n = weekday[d.getMonth()];
    document.getElementById('dateMonth').innerHTML = n;
}

function getDay(){
    var d = new Date();
    var n = d.getUTCDate();
    document.getElementById('dateDay').innerHTML = n;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }
    ;  // add zero in front of numbers < 10
    return i;
}
