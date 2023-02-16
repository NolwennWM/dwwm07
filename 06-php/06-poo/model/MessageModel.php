<?php 
namespace Model;
use Classes\AbstractModel;

class MessageModel extends AbstractModel
{
    /**
     * Récupère tous les messages d'un utilisateur.
     *
     * @param integer $idUser
     * @return array|false
     */
    function getMessageByUser(int $idUser): array|false
    {
        $sql = $this->pdo->prepare("SELECT m.*, c.nom as categorie FROM messages m LEFT JOIN categories c ON c.idCat = m.idCat WHERE idUser = ? ORDER BY m.createdAt DESC");
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
        $sql = $this->pdo->prepare("SELECT * FROM messages WHERE idMessage = ?");
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
        $sql = $this->pdo->prepare("SELECT m.*, c.nom as categorie FROM messages m LEFT JOIN categories c ON c.idCat = m.idCat WHERE idUser = ? AND m.idCat = ? ORDER BY m.createdAt DESC");
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
        if(count($values) === 2)
            $sql = $this->pdo->prepare("INSERT INTO messages (message, idUser) VALUES (:m, :id)");
        else
            $sql = $this->pdo->prepare("INSERT INTO messages (message, idUser, idCat) VALUES (:m, :id, :cat)");
        
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
        $sql = $this->pdo->prepare("DELETE FROM messages WHERE idMessage = ?");
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
        $sql = $this->pdo->prepare("UPDATE messages SET message = ?, idCat = ?, editedAt = current_timestamp() WHERE idMessage = ?");
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
        $sql = $this->pdo->prepare("SELECT COUNT(*) as total FROM messages WHERE idUser = ?");
        $sql->execute([$idUser]);
        return $sql->fetch();
    }
}
?>