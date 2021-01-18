<?php declare(strict_types = 1);

namespace App\DataFixtures;

use App\Entity\ShortUrl;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShortUrlFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shortUrl = new ShortUrl();

        $shortUrl->setLongUrl('https://github.com/jbtcd');
        $shortUrl->setShortUrl('github');

        $manager->persist($shortUrl);
        $manager->flush();
    }
}
