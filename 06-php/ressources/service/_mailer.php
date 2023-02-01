<?php 
/* 
    Pour nous simplifier la gestion des mails, on utilise PHPMailer qui est un package populaire.

    On l'a installé avec Composer qui est l'équivalent le plus connu à NPM pour PHP.

    On indique les namespaces qui vont être utilisés:
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
/* 
    On require l'autoloader de composer pour qu'il require automatiquement les classes dont on va avoir besoin.
*/
require __DIR__. "/../vendor/autoload.php";
/**
 * Envoi un Email.
 *
 * @param string $from
 * @param string $to
 * @param string $subject
 * @param string $body
 * @return string
 */
function sendMail(string $from, string $to, string $subject, string $body): string
{
    /* 
        On crée un nouvel objet PHPMailer,
        L'argument à true active les exceptions (type d'erreur)
    */
    $mail = new PHPMailer(true);
    try
    {
        /* 
            Paramètres du serveur de mail :
            Toute les informations suivante, sont disponible sur votre serveur de mail.

            On active l'utilisation de SMTP.
            (Simple Mail Transfer Protocol)
        */
        $mail->isSMTP();
        # On indique où est hébergé le serveur de mail.
        $mail->Host = "sandbox.smtp.mailtrap.io";
        # On active l'authentification par SMTP
        $mail->SMTPAuth = true;
        # On indique quel port est utilisé. 
        $mail->Port = 2525;
        # On indique l'username et le password
        $mail->Username = "1e77adf0ab1df0";
        $mail->Password = "5779de4e98bd51";
        # Active les détails sur le déroulement de la requête.
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        # Quel type de chiffrement est utilisé pour envoyer le mail.
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        /* 
            Expediteur et Destinataire:

            setFrom prendra l'adresse de l'expediteur. (et optionnellement un nom.)
        */
        $mail->setFrom($from);
        # addAddress permet d'ajouter un destinataire (avec optionnellement un nom);
        $mail->addAddress($to);
        /* 
            "addReplyTo" permet d'indiquer une réponse.
            "addCC" permet d'ajouter une adresse en copie.
            "addBCC" permet d'ajouter une adresse en copie caché.

            "addAttachment" qui permet d'ajouter une pièce jointe.
        */
        # Indique que l'email sera en HTML.
        $mail->isHTML(true);
        # Indique le sujet du mail.
        $mail->Subject = $subject;
        # Indique le corps du mail.
        $mail->Body = $body;
        /* 
            On peut ajouter un "AltBody" dans le cas où le client mail du destinataire ne gère pas le HTML.

            On envoi l'email.
        */
        $mail->send();
        return "Message Envoyé";
    }catch(Exception $e)
    {
        // Si une erreur est produite, on ne l'affiche pas directement mais retourne le mesage d'erreur suivant.
        return "Le message n'a pas pu être envoyé. Mailer Error : {$mail->ErrorInfo}";
    }
}
?>