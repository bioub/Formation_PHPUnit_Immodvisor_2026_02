<?php

namespace App\Tests\Repository;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactRepositoryTest extends KernelTestCase
{
    private ContactRepository $repository;

    public function setUp(): void {
        self::bootKernel();
        $this->repository = static::getContainer()->get(ContactRepository::class);
    }

    public function testFindAll(): void
    {
        $contacts = $this->repository->findAll(true);

        $this->assertCount(4, $contacts);
    }
}
