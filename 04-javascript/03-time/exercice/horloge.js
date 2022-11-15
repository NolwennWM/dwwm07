"use strict";
const tH = document.querySelector('.hour');
const tM = document.querySelector('.minute');
const tS = document.querySelector('.second');
let time, h, m, s;
function start()
{
    time = new Date();
    h = time.getHours()*30-90;
    m = time.getMinutes()*6-90;
    s = time.getSeconds()*6-90;
    tS.style.transform = `rotate(${s}deg)`;
    tM.style.transform = `rotate(${m}deg)`;
    tH.style.transform = `rotate(${h}deg)`;
}
setInterval(start, 1000);