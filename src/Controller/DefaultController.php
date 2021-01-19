<?php declare(strict_types = 1);

namespace App\Controller;

use App\Entity\ShortUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function indexAction(Request $request): Response
    {
        $form = $this->createForm(SearchType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($this->getDoctrine()->getRepository(ShortUrl::class)->findOneBySomeField($form->getData()));
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
