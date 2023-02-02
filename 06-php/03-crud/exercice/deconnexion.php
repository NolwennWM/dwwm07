<?php
require("../../ressources/service/_shouldBeLogged.php");
shouldBeLogged(true, "./connexion.php");
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID","", time()-3600);
header("location: ./connexion.php");
exit;
?>