<?php

namespace App\Entity\Store;

use App\Repository\Store\ProductRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(name="sto_product")
 */
class Product
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private ?int $id = NULL;

	/**
	 * @ORM\Column(type="text")
	 */
	private ?string $description = NULL;

	/**
	 * @ORM\Column(type="decimal", precision=10, scale=2)
	 */
	private ?float $price = NULL;

	/**
	 * @ORM\Column(type="datetime_immutable")
	 */
	private DateTimeImmutable $createdAt;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private ?string $name = NULL;

	public function __construct()
	{
		$this->createdAt = new DateTimeImmutable();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	public function getPrice(): ?float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;

		return $this;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getCreatedAt(): DateTimeImmutable
	{
		return $this->createdAt;
	}
}
