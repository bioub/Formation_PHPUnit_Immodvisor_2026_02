<?php

namespace App\Tests\Manager;

use App\Manager\CompanyManager;
use App\Manager\ContactManager;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CompanyManagerTest extends KernelTestCase
{
    public function testGetAll(): void
    {
        $kernel = self::bootKernel();

        $manager = static::getContainer()->get(CompanyManager::class);

        $companies = $manager->getAll();

        $this->assertCount(0, $companies);
    }
}
