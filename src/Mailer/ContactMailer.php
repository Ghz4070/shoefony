<?php

namespace App\Mailer;

use App\Entity\Contact;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactMailer
{
    public $mailer;

    public $contactEmailAddress;

    public $twig;

    public function __construct(
        MailerInterface $mailer,
        Environment $twig,
        string $contactEmailAddress
    ) {
        $this->mailer = $mailer;
        $this->contactEmailAddress = $contactEmailAddress;
        $this->twig = $twig;
    }

    public function send(Contact $contact)
    {
        $email = (new Email())
          ->from('hello@example.com')
          ->to($this->contactEmailAddress)
          ->subject('Un message de contact sur Shoefony')
          ->html(
              $this->twig->render(
                'email/contact.html.twig',
                ['contact' => $contact]
            )
          );

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
        }
    }
}
