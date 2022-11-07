/*
    Demander l'heure, les minutes et les secondes à l'utilisateur,
    puis lui donner l'heure qu'il sera 1 seconde plus tard.
*/
let h = prompt("Donne moi l'heure !"),
    m = prompt("Donne moi les minutes"),
    s = prompt("Donne moi les secondes");
// version 1 :
s++;
if(s==60){
    s=0;
    m++;
    if(m==60){
        m=0;
        h++
        if(h==24){
            h=0;
        }
    }
}
// Version 2 : plus courte bien que plus gourmande
// if(++s==60) s=0;
// if(++m==60) m=0;
// if(++h==24) h=0;
alert(`Dans une seconde il sera ${h}h${m}m${s}s.`);