<?php 
// Quel adresse peut envoyer des requêtes à notre serveur. (* pour toute adresse)
header("Access-Control-Allow-Origin: http://spa.localhost");

// Format des données échangés.
header("Content-Type: application/json; charset=UTF-8");

// Durée de vie de la requête. (facultatif)
header("Access-Control-Max-Age: 3600");

// On indique la possibilité d'échanger des identifiants.
header("Access-Control-Allow-Credentials: true");

// Indique les entêtes autorisées.
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

/**
 * Change le status de la requête et affiche sous format JSON les données passées en paramètre.
 *
 * @param array $data
 * @param integer $status
 * @param string $message
 * @return void
 */
function sendResponse(array $data, int $status, string $message): void
{
    http_response_code($status);
    echo json_encode([
        "data"=>$data,
        "status"=>$status,
        "message"=>$message
    ]);
    exit;
}
/**
 * Sauvegarde des messages d'erreur si les paramètres sont fournis
 * Et retourne le total des erreurs si les paramètres sont laissé vide.
 *
 * @param string|boolean $property
 * @param string|boolean $message
 * @return void|array
 */
function setError($property = false, $message = false)
{
    static $error = [];
    if(!$property && !$message) return ["violations"=>$error];

    $error[] = [
        "propertyPath"=>$property,
        "message"=>$message
    ];
}
?>