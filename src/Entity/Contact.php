<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 * @ORM\Table(name="app_contact")
 */
class Contact
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private ?int $id = NULL;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
	 */
	private ?string $firstName = NULL;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
	 */
	private ?string $lastName = NULL;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
	 * @Assert\Email(message="L'email {{ value }} n'est pas valide.")
	 */
	private ?string $email = NULL;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
	 * @Assert\Length(min="25", minMessage="Votre message doit contenir au
	 *                          minimum {{ limit }} caractères.")
	 */
	private ?string $message = NULL;

	/**
	 * @return null
	 */
	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	/**
	 * @param null $firstName
	 *
	 * @return Contact
	 */
	public function setFirstName($firstName): self
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * @return null
	 */
	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	/**
	 * @param null $lastName
	 *
	 * @return Contact
	 */
	public function setLastName($lastName): self
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * @return null
	 */
	public function getEmail(): ?string
	{
		return $this->email;
	}

	/**
	 * @param null $email
	 *
	 * @return Contact
	 */
	public function setEmail($email): self
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return null
	 */
	public function getMessage(): ?string
	{
		return $this->message;
	}

	/**
	 * @param null $message
	 *
	 * @return Contact
	 */
	public function setMessage($message): self
	{
		$this->message = $message;

		return $this;
	}

	public function getId(): ?int
	{
		return $this->id;
	}
}
