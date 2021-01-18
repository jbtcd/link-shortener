<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectController extends AbstractController
{
    public function redirectAction(string $shortUrl): RedirectResponse
    {
        // TODO: Get redirects from database
        $redirects = [
            'github' => 'https://github.com/jbtcd',
        ];

        if (!isset($redirects[$shortUrl])) {
            throw $this->createNotFoundException('Redirect not found');
        }

        // TODO: Increase redirect call count in database

        return new RedirectResponse($redirects[$shortUrl]);
    }

}
