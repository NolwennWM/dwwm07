"use strict";

const main = document.querySelector("main");

const routes = {
  "/": "pages/home.html",
  "/contact": "pages/contact.html",
  "/about": "pages/about.html",
  "/404": "pages/404/html",
};

function setLinks(document) {
  const links = document.querySelectorAll('a:not([href^="http"])');
  links.forEach((link) => {
    link.addEventListener("click", router);
  });
}
setLinks(document);

function router(e) {
  e.preventDefault();
  window.history.pushState({}, "", e.target.href);
  loadPage();
}

function loadPage() {
  const path = location.pathname;
  let route;
  if (routes[path]) {
    route = routes[path];
  } else {
    route = routes["404"];
  }
  // Version beaucoup plus rapide !!!
  // const url = routes[path] || routes["404"]
  fetch(route).then((resp) => {
    if (resp.ok) {
      resp.text().then((data) => {
        main.innerHTML = data;
        // Mettre à l'intérieur les fonctions utilisables sur les différentes pages
        // Comme reduce() ou inscription()
        // lancerFonctions();
        setLinks(main);
      });
    }
  });
}
loadPage();

const nav = document.querySelector("nav");

// button sur video
function reduce() {
  const main = document.querySelector("main");
  const video = document.querySelector(".video");
  video.classList.add("small");
  nav.append(video);
  main.innerHTML = "<h2>ABOUT</h2>";
}

function inscription() {
  const form = document.querySelector("form");
  form.addEventListener("submit", inscription);
  alert("Inscription confirmée pour :" + email.value);
}
