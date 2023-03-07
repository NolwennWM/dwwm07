"use strict";
// Je selectionne les différents élément HTML avec lesquels je vais interagir
const userInp = document.querySelector('#username');
const loginBtn = document.querySelector('#userBtn');
const chat = document.querySelector('.blockChat .chat');
const messageInp = document.querySelector('#message');
const sendBtn = document.querySelector('#sendMessage');
let conn, user;

// lors du clique sur le bouton de connexion
loginBtn.addEventListener("click", login)
// Lors de l'appui sur la touche entrée dans le champ "nom d'utilisateur"
userInp.addEventListener("keypress", e=>e.key==="Enter"?login.bind(loginBtn)():"");
// Lors du clique sur le bouton d'envoi de message
sendBtn.addEventListener("click", handleMessage);
// Lors de l'appui sur la touche entrée dans le champ "message"
messageInp.addEventListener("keypress", e=>e.key==="Enter"?handleMessage.bind(sendBtn)():"");
/**
 * Connecte ou déconnecte l'utilisateur.
 */
function login()
{
    if(userInp.value && !conn)
    {
        user = userInp.value;
        conn = new WebSocket("ws://localhost:8080");
        userInp.readOnly = true;
        this.textContent = "Déconnexion";
        this.classList.add("logout");
        messageInp.focus();
        setting();
    }
    else if(conn)
    {
        sendMessage("Server", `${user} est déconnecté(e)!`);
        conn.close();
        conn = undefined;
        this.classList.remove("logout");
        this.textContent = "Connexion";
        userInp.readOnly = false;
    }
}
/**
 * Paramètre les évènements de la connexion.
 */
function setting()
{
    // Lorsque la connexion est établie
    conn.onopen = ()=>{
        onMessage({sender:"Server", message: "Connexion établie!"});
        sendMessage("Server", `${user} est connecté(e)!`);
    }
    // Lorsque la connexion est fermée
    conn.onclose = ()=>onMessage({sender:"Server", message: "Déconnecté!"});
    // Lorsque le serveur nous envoi un message 
    conn.onmessage = e=>onMessage(JSON.parse(e.data));
}
/**
 * Affiche un message dans le chat
 * @param {Object} m 
 */
function onMessage(m)
{
    chat.textContent += `😆${m.sender} : ${m.message}\r\n`;
    chat.scrollTop = chat.scrollHeight;
}
/**
 * Envoi un message au serveur.
 * @param {string} u Nom de l'expéditeur
 * @param {string} m message
 */
function sendMessage(u,m)
{
    conn.send(JSON.stringify({sender:u, message:m}));
}
/**
 * Vérifie le message avant l'envoi.
 */
function handleMessage()
{
    if(messageInp.value)
    {
        onMessage({sender:user, message:messageInp.value});
        sendMessage(user, messageInp.value);
        messageInp.value = "";
        messageInp.focus();
    }
}