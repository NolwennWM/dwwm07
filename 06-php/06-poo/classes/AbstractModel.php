<?php 
namespace Classes;
require __DIR__."/../../ressources/service/_pdo.php";

abstract class AbstractModel
{
    protected \PDO $pdo;
    function __construct()
    {
        $this->pdo = connexionPDO();
    }
}
?>