if("serviceWorker" in navigator)
{
    navigator.serviceWorker.register("./sw.js");
}

// Exemple de polyfill:

if(!Math.trunc)
{
    Math.trunc = function(number)
    {
        return number<0?Math.ceil(number): Math.floor(number);
    };
}
const element = document.querySelector('body');
// js récent :
// const h = element.height??100;
// Js passé sous transpiler :
var h = (element.height !== undefined && element.height !== null)?element.height : 100;