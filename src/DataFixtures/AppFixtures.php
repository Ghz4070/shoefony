<?php

namespace App\DataFixtures;

use App\Entity\Store\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
	private ObjectManager $objectManager;

	public function load(ObjectManager $objectManager): void
	{
		$this->objectManager = $objectManager;

		$this->loadProducts();

		$objectManager->flush();
	}

	private function loadProducts(): void
	{
		for ($i = 1; $i <= 15; $i++) {
			$product = (new Product ())
				->setName('product ' . $i)
				->setDescription('Produit de description' . $i)
				->setPrice(mt_rand(10, 100));

			$this->objectManager->persist($product);
		}
	}
}
