<?php declare(strict_types = 1);

namespace App\Controller;

use App\Entity\ShortUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectController extends AbstractController
{
    public function redirectAction(string $shortUrl): RedirectResponse
    {
        /** @var ?ShortUrl $shortUrl */
        $shortUrl = $this->getDoctrine()->getRepository(ShortUrl::class)->findOneBy(['short_url' => $shortUrl]);

        if ($shortUrl === null) {
            throw $this->createNotFoundException();
        }

        $calls = (int)$shortUrl->getCalls();
        $calls++;

        $shortUrl->setCalls($calls);

        $this->getDoctrine()->getManager()->persist($shortUrl);
        $this->getDoctrine()->getManager()->flush();

        return new RedirectResponse($shortUrl->getLongUrl());
    }

}
