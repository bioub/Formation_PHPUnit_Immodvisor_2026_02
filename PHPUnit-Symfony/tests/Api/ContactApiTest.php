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
}
