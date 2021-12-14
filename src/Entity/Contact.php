<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     */
    private $firstName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     */
    private $lastName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Email(message="L'email {{ value }} n'est pas valide.")
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Length(min="25", minMessage="Votre message doit contenir au
     *                          minimum {{ limit }} caractères.")
     */
    private $message = null;

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null $firstName
     *
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null $lastName
     *
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param null $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
