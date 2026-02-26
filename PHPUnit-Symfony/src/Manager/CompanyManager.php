<?php

namespace App\Manager;

use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;

class CompanyManager
{
    private EntityManagerInterface $entityManager;
    private CompanyRepository $companyRepository;

    public function __construct(EntityManagerInterface $entityManager, CompanyRepository $companyRepository)
    {
        $this->entityManager = $entityManager;
        $this->companyRepository = $companyRepository;
    }

    public function getAll() {
        return $this->companyRepository->findAll();
    }
}