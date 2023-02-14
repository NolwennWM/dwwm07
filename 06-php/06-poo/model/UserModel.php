<?php 
namespace Model;
use Classes\AbstractModel;

class UserModel extends AbstractModel
{
    /**
     * Récupère tous les utilisateurs.
     *
     * @return array
     */
    function getAllUsers(): array|false
    {
        $sql = $this->pdo->query("SELECT idUser, username FROM users");
        return $sql->fetchAll();
    }
    /**
     * Sélectionne un utilisateur par son Email.
     *
     * @param string $email
     * @return array|false
     */
    function getOneUserByEmail(string $email): array|false
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :em");
        $sql->execute(["em"=>$email]);
        return $sql->fetch();
    }
    /**
     * Sélectionne un utilisateur par son ID.
     *
     * @param integer $id
     * @return array|false
     */
    function getOneUserById(int $id): array|false
    {
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE idUser = ?");
        $sql->execute([$id]);
        return $sql->fetch();
    }
    /**
     * Ajoute un utilisateur en base de donnée.
     *
     * @param string $us
     * @param string $em
     * @param string $pass
     * @return void
     */
    function addUser(string $us, string $em, string $pass): void
    {
        $sql = $this->pdo->prepare("INSERT INTO users(username, email, password) VALUES(?,?,?)");
        $sql->execute([$us, $em, $pass]);
    }
    /**
     * Supprimer un utilisateur par son ID.
     *
     * @param integer $id
     * @return void
     */
    function deleteUserById(int $id):void
    {
        $sql = $this->pdo->prepare("DELETE FROM users WHERE idUser=?");
        $sql->execute([$id]);
    }
    /**
     * Met à jour un utilisateur via son ID.
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @param integer $id
     * @return void
     */
    function updateUserById(string $username, string $email, string $password, int $id):void
    {
        $sql = $this->pdo->prepare("UPDATE users SET 
                username = :us,
                email = :em,
                password = :mdp
                WHERE idUser = :id");
        $sql->execute([
            "id"=>$id,
            "em"=>$email,
            "us"=>$username,
            "mdp"=>$password
        ]);
    }
}
?>