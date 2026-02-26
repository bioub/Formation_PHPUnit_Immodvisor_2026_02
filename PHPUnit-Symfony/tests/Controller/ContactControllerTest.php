<?php

namespace App\Tests\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();

        $mock = $this->createMock(ContactRepository::class);
        $mock->expects(self::once())->method('findAllWithCompaniesDQL')->willReturn([(new \App\Entity\Contact())->setId(1)->setFirstname('Toto')]);

        self::getContainer()->set(ContactRepository::class, $mock);

        $crawler = $client->request('GET', '/contacts');

        self::assertResponseIsSuccessful();

//        $this->assertContains('Liste des contacts', $crawler->filter('h2')->text());


        self::assertSelectorTextContains('body', 'Liste des contacts');
        self::assertSelectorTextContains('body', 'Toto');
    }
}
