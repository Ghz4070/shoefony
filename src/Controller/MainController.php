<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="main_homepage")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

	/**
     * @Route("/presentation", name="main_presentation")
     */
    public function presentationStore(): Response
    {
        return $this->render('main/presentation.html.twig', [
            'main_presentation' => 'Presentation Boutique Shoefony',
        ]);
    }
}
