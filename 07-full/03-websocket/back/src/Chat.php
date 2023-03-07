<?php 
namespace AFCI;
require __DIR__."/../vendor/autoload.php";
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;
    public function __construct()
    {
        // Une classe permettant le stockages d'objets.
        $this->clients = new \SplObjectStorage();
    }
    public function onOpen(ConnectionInterface $conn)
    {
        // Je range ma nouvelle connexion dans ma liste.
        $this->clients->attach($conn);
        // J'affiche un message confirmant la connexion.
        echo "Nouvelle Connexion ! ({$conn->resourceId})\n";
    }
    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Je calcul combien de connexion vont recevoir le message.
        $numRecv = count($this->clients)-1;
        $pluriel = $numRecv===1?"":"s";
        // J'affiche un message indiquant la connexion expédiant le message, le message et le nombre de destinataire.
        echo sprintf("Connexion %d envoi le message \"%s\" à %d autre%s connexion%s \n", $from->resourceId, $msg, $numRecv, $pluriel, $pluriel);
        // Pour chacune des connexions stockées
        foreach($this->clients as $client)
        {
            // Si ce n'est pas l'expediteur du message
            if($from != $client)
            {
                // On lui envoi le message.
                $client->send($msg);
            }
        }
    }
    public function onClose(ConnectionInterface $conn)
    {
        // Je retire ma connexion de ma liste
        $this->clients->detach($conn);
        // J'affiche un message confirmant la déconnexion.
        echo "Connexion {$conn->resourceId} est déconnecté.\n";
    }
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // J'affiche le message d'erreur
        echo "Une erreur a eu lieu : {$e->getMessage()}\n";
        // Je ferme la connexion ayant provoqué l'erreur.
        $conn->close();
    }
}
?>