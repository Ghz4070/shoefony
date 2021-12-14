<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Mailer\ContactMailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class MainController extends AbstractController
{

    /**
     * @var \App\Mailer\ContactMailer
     */
    private $mailer;

    public function __construct(ContactMailer $mailer)
    {
        $this->mailer = $mailer;
    }


    /**
     * @Route("/", name="main_homepage")
     */
    public function homepage(): Response
    {
        return $this->render('main/homepage.html.twig', [
          'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/presentation", name="main_presentation",
     *            methods={"GET"})
     */
    public function presentation(): Response
    {
        return $this->render('main/presentation.html.twig');
    }

    /**
     * @Route("/contact", name="main_contact",
     *            methods={"GET", "POST"})
     */
    public function contact(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Merci pour votre message');
            $this->mailer->send($contact);

            return $this->redirectToRoute('main_contact');
        }

        return $this->render('main/contact.html.twig', [
          'form' => $form->createView(),
        ]);
    }
}
