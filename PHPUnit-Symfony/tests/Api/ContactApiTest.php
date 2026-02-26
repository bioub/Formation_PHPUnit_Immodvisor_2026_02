<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class ContactApiTest extends ApiTestCase
{
    public function testSomething(): void
    {
        $response = static::createClient()->request('GET', '/api/contacts');

        self::assertResponseIsSuccessful();
        self::assertJsonContains(['@id' => '/api/contacts']);
        self::assertJsonContains(['totalItems' => 4]);
    }

    public function testPost(): void {
        $client = static::createClient();
        $client->request('POST', '/api/contacts', ['json' => ['firstname' => 'Toto', 'lastname' => 'Tata'], 'headers' => ['Content-Type' => 'application/ld+json']]);

        self::assertResponseIsSuccessful();

    }
}
