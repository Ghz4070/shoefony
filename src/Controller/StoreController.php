<?php

namespace App\Controller;

use App\Repository\Store\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
	private ProductRepository $productRepository;

	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	/**
	 * @Route("/store",
	 *     name="store_list_products",
	 *      methods={"GET"}
	 * )
	 */
	public function listProducts(): Response
	{
		$allProducts = $this->productRepository->findAll();

		return $this->render('store/list_products.html.twig', [
			'all_products' => $allProducts,
			'controller_name' => 'StoreController',
		]);
	}

	/**
	 * @Route("/store/product/{id}/details/{slug}",
	 *     requirements={"id" ="\d+"},
	 *     name="store_show_product",
	 *      methods={"GET"}
	 * )
	 */
	public function product(Request $request, int $id, string $slug): Response
	{
		return $this->render('store/product.html.twig', [
			'controller_name' => 'StoreController',
			'id' => $id,
			'slug' => $slug,
			'url' => $this->generateUrl(
				'store_show_product',
				['id' => $id, 'slug' => $slug]
			),
			'user_ip' => $request->getClientIp(),
		]);
	}
}
