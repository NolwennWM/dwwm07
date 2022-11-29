function tri(tableau)
{
    return new Promise(tri2)
    function tri2(resolve, reject){
        tableau.sort((a,b)=>{
            if(typeof a != typeof b)
            {
                reject()
            }
            else
            {
                return a - b
            }
        })
        resolve()
    }
}
let tableau = [3, 6, 2];
tri(tableau).then(()=>{console.log("Tableau trié, " + tableau)}).catch(()=>{console.log("Erreur")});

const feuRouge = document.querySelector('.div2');
const feuOrange = document.querySelector('.div3');
const feuVert = document.querySelector('.div4');


function rouge(params) { 
    return new Promise((resolve)=>{
        setTimeout(()=>{
            feuOrange.classList.remove("orange")
            resolve();
            feuRouge.classList.add("red")
        },1000)
    })

}
function orange(params) {
    return new Promise((resolve)=>{
        setTimeout(()=>{
            feuVert.classList.remove("green")
            resolve();
            feuOrange.classList.add("orange")
        },3000)
    })
}
function vert(params) {
    return new Promise((resolve)=>{
        setTimeout(()=>{
            feuRouge.classList.remove("red")
            resolve();
            feuVert.classList.add("green")
        },1000)
    })
}
function tricolors(params) {
    vert().then(()=>{
        orange().then(()=>{
            rouge().then(()=>{
                tricolors()
            })
        })
    })
}
tricolors()