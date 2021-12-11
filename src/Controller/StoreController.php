<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    /**
     * @Route("/store/product/{id}/details/{slug}", name="store_show_product")
     */
    public function index(Request $request, int $id, string $slug): Response
    {
        return $this->render('store/index.html.twig', [
			'slug' => $slug,
			'id' => $id,
			'client_ip' => $request->getClientIp(),
			'url' => $request->getPathInfo(),
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/contact", name="main_contact")
     */
    public function contact(): Response
    {
        return $this->render('store/contact.html.twig', [
            'contact_arg' => 'Contact',
        ]);
    }
}
