<?php 
require_once __DIR__."/../../ressources/service/_pdo.php";
/**
 * Récupère tous les messages d'un utilisateur.
 *
 * @param integer $idUser
 * @return array|false
 */
function getMessageByUser(int $idUser): array|false
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT m.*, c.nom as categorie FROM messages m LEFT JOIN categories c ON c.idCat = m.idCat WHERE idUser = ? ORDER BY m.createdAt DESC");
    $sql->execute([$idUser]);
    return $sql->fetchAll();
}
/**
 * Retourne un message via son ID
 *
 * @param integer $id
 * @return array|false
 */
function getMessageById(int $id): array|false
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM messages WHERE idMessage = ?");
    $sql->execute([$id]);
    return $sql->fetch();
}
/**
 * Retourne la liste des messages d'un utilisateur pour une catégorie donnée.
 *
 * @param integer $idUser
 * @param integer $idCat
 * @return array|false
 */
function getMessageByUserAndCategory(int $idUser, int $idCat):array|false
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT m.*, c.nom as categorie FROM messages m LEFT JOIN categories c ON c.idCat = m.idCat WHERE idUser = ? AND idCat = ? ORDER BY m.createdAt DESC");
    $sql->execute([$idUser, $idCat]);
    return $sql->fetchAll();
}
/**
 * Créer un nouveau message
 *
 * @param array $values
 * @return void
 */
function addMessage(array $values): void
{
    $pdo = connexionPDO();
    if(count($values) === 2)
        $sql = $pdo->prepare("INSERT INTO messages (message, idUser) VALUES (:m, :id)");
    else
        $sql = $pdo->prepare("INSERT INTO messages (message, idUser, idCat) VALUES (:m, :id, :cat)");
    
    $sql->execute($values);
}
/**
 * Supprime un message via son ID
 *
 * @param integer $id
 * @return void
 */
function deleteMessageById(int $id): void
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("DELETE FROM messages WHERE idMessage = ?");
    $sql->execute([$id]);
}
/**
 * Met à jour un message via son ID.
 *
 * @param integer $idMessage
 * @param string $content
 * @param integer|Null $idCat
 * @return void
 */
function updateMessageById(int $idMessage, string $content, int $idCat = Null): void
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("UPDATE messages SET message = ?, idCat = ?, editedAt = current_timestamp() WHERE idMessage = ?");
    $sql->execute([$content, $idCat, $idMessage]);
}
/**
 * Compte le nombre de message d'un utilisateur.
 *
 * @param integer $idUser
 * @return array
 */
function countMessageByUser(int $idUser): array
{
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT COUNT(*) as total FROM messages WHERE idUser = ?");
    $sql->execute([$idUser]);
    return $sql->fetch();
}
?>