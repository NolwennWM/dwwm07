<?php 
require __DIR__."/../vendor/autoload.php";
require __DIR__."/../src/Chat.php";
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use AFCI\Chat;
// On construit un nouveau serveur
$server = IoServer::factory(
    // un serveur http qui contient
    new HttpServer(
        // Un serveur websocket qui contient
        new WsServer(
            // Notre chat.
            new Chat()
        )
    ),
    // Le tout sur le port 8080
    8080
);
// On lance notre serveur.
$server->run();
?>