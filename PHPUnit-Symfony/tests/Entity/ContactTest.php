<?php

namespace App\Tests\Entity;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testGetSetPhone(): void
    {
        $phone = '0612345678';

        $contact = new Contact();
        $contact->setPhone($phone);

        $this->assertEquals($phone, $contact->getPhone());
    }
}
