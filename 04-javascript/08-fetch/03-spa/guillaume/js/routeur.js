const route = (event) => {
    event = event || window.event;
    event.preventDefault();
    window.history.pushState({}, "", event.target.href)
    handleLocation();
}

const routes = {
    404:"404.html",
    "/": "home.html",
    "/about": "about.html",
    "/lorem": "lorem.html",

};

const handleLocation = async () => {
    const path = window.location.pathname;
    const url = routes[path] || routes[404];
    console.log(url);
    const html = await fetch(url).then((data) => data.text())
    document.getElementById("main-page").innerHTML = html;
    
}



 window.onpopstate = handleLocation;

window.route = route;

handleLocation();