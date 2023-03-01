"use strict";
export default {
    "/": {
        html:"user/list.html",
        js:"tableUser.js"
    },
    "/inscription": {
        html:"user/inscription.html",
        js:"form.js", 
        option:"POST"
    },
    "/user/update": {
        html:"user/inscription.html",
        js:"form.js", 
        option:"PUT"
    },
    "/user/delete": {
        html:"user/list.html",
        js:"delete.js"
    },
    "/connexion": {
        html:"auth/connexion.html",
        js:"auth.js", 
        option:"POST"
    },
    "/deconnexion": {
        html:"auth/connexion.html",
        js:"auth.js"
    }
}