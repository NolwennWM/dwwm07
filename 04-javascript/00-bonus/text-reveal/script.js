"use strict";
const btnOpa = document.querySelector('#opacity');
const btnRes = document.querySelector('#reset');
const spans = document.querySelectorAll('main span');

btnOpa.addEventListener("click", show);
btnRes.addEventListener("click", reset);

function show()
{
    // for(let i = 0; i<spans.length; i++)
    // {
    //     setTimeout(()=>spans[i].style.opacity="1", 400*(1+i));
    // }
    spans.forEach((li, i)=>{
        setTimeout(()=>li.style.opacity="1", 400*(1+i));
    })
}
function reset()
{
    spans.forEach(sp=>sp.style.opacity="");
}