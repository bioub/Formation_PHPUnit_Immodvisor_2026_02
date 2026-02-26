<?php

namespace App\Manager;

use App\Entity\Contact;

class ContactManager
{
    protected array $entities = [];

    public function __construct()
    {
        $this->entities = [
            (new Contact())->setId(1)->setFirstname('Bill')->setLastname('Gates'),
            (new Contact())->setId(2)->setFirstname('Steve')->setLastname('Jobs'),
        ];
    }

    /**
     * @return Contact[]
     */
    public function findAll(): array
    {
        return $this->entities;
    }
}