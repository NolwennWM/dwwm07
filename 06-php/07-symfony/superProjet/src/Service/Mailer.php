<?php
namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class Mailer
{
    public function __construct(Private MailerInterface $mailer)
    {}
    public function sendEmail(
        string $from = "noreply@cours.fr",
        string $to = "nolwenn@cours.fr",
        string $subject = "Message Automatique",
        string $content = "Ne pas répondre à ce message."
    ):void
    {
        //<https://symfony.com/doc/current/mailer.html>
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->html($content);
        $this->mailer->send($email);
    }
}
?>