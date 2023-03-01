"use strict";

import router from "./router.js";

if(sessionStorage.getItem("logged"))
{
    const h2 = document.querySelector("header h2");
    h2.textContent = sessionStorage.getItem("username");
}

router(window.location.pathname);